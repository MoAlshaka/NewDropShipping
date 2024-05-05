const closePopupBtn = document
    .getElementById("closePopup")
    .addEventListener("click", closePopup);

document.getElementById("addRow").addEventListener("click", () => {
    const routeUrl = document.getElementById("addRow").getAttribute("data-route");
    const requiredFiledsIndex = [
        {
            id: 0,
            name: "order Date",
            msgErr: "Please Enter Date",
            required: false,
            regex:
                /^(19[0-9]{2}|2[0-9]{3})-(0[1-9]|1[012])-([123]0|[012][1-9]|31) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/g,
        },
        {
            id: 1,
            name: "store Reference",
            msgErr: "Please Enter a valid Store Reference",
            required: true,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 2,
            name: "store Name",
            msgErr: "Please Enter a valid Store Name",
            required: false,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 3,
            name: "warehouse",
            msgErr: "Please Enter a valid Warehouse",
            required: true,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 4,
            name: "customer Name",
            msgErr: "Please Enter a valid Customer Name",
            required: true,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 5,
            name: "customer Phone",
            msgErr: "Please Enter a valid Customer Phone",
            required: true,
            regex:
                /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/g,
        },
        {
            id: 6,
            name: "customer Phone 2",
            msgErr: "Please Enter a valid Customer Phone",
            required: false,
            regex:
                /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/g,
        },
        {
            id: 7,
            name: "customer Email",
            msgErr: "Please Enter a valid Customer Email",
            required: false,
            regex: /([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/g,
        },
        {
            id: 8,
            name: "customer Country",
            msgErr: "Please Enter a valid Customer Country",
            required: true,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 9,
            name: "customer City",
            msgErr: "Please Enter a valid Customer City",
            required: false,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 10,
            name: "customer Address",
            msgErr: "Please Enter a valid Customer Address",
            required: false,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 11,
            name: "SKU",
            msgErr: "Please Enter a valid SKU",
            required: true,
            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 12,
            name: "Quantity",
            msgErr: "Please Enter a valid Quantity",
            required: true,
            regex: /(^(0{0,1}|([1-9][0-9]*))?$)/g,
        },
        {
            id: 13,
            name: "total",
            msgErr: "Please Enter a valid total",
            required: true,
            regex: /(^(0{0,1}|([1-9][0-9]*))(\.[0-9]{1,3})?$)/g,
        },
        {
            id: 14,
            name: "curency",
            msgErr: "Please Enter a valid curency",
            required: true,

            regex: /[^$][.*\d+]?.*/gi,
        },
        {
            id: 15,
            name: "notes",
            msgErr: "Please Enter a valid notes",
            required: false,
            regex: /[^$][.*\d+]?.*/gi,
        },
    ];
    const data = myTable.getJson().filter((row) => {
        if (
            row[1] &&
            row[3] &&
            row[4] &&
            row[5] &&
            row[8] &&
            row[11] &&
            row[12] &&
            row[13] &&
            row[14]
        ) {
            return true;
        }
        return false;
    });
    let validData = true;
    const validRows = data.map((row, index) => {

        for (const [key, value] of Object.entries(row)) {
            // console.log(value + ":", requiredFiledsIndex[key].regex.test(value));
            if (requiredFiledsIndex[key].regex.test(value)) {
                document.querySelector(
                    `td[data-x='${key}'][data-y='${index}']`
                ).style.backgroundColor = "white";

            } else if (value && !requiredFiledsIndex[key].regex.test(value)) {
                document.querySelector(
                    `td[data-x='${key}'][data-y='${index}']`
                ).style.backgroundColor = "red";
                openPopup(requiredFiledsIndex[key].msgErr);
                validData = false;
            }
        }
        return validData;
    });
    console.log("valid Array", validRows);


    if (data.length === 0) {
        openPopup("Fill all required fields");
    } else if (data.length > 0 && validData === true) {
        fetch(routeUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',

            },
            body: JSON.stringify({
                _token: document.querySelector('input[name="_token"]').getAttribute('value'),
                data: data

            }),
            credentials: 'include' // or 'include' if you need to include cookies for cross-origin requests
        })
            .then(response => {


                return response.json();
            })
            .then(data => {

                if (data.errors) {
                    openPopup("error");
                    console.log('Validation errors:', data.errors);
                } else if (data.Add) {

                    console.log('Data stored successfully');
                    window.location.href = "/seller/leads";
                }
            })
    }
});

function closePopup() {
    document.getElementById("customPopup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function openPopup(message) {
    document.getElementById("customPopup").style.display = "flex";
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popupContent").innerText = message;
}
