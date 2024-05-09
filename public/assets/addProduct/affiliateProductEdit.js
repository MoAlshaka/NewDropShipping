window.addEventListener('load', function () {
    const desc = document.getElementById("data-desc").getAttribute("data-desc")
    document.querySelector("[data-placeholder]>p").innerText = desc
})
const closePopupBtn = document
    .getElementById("closePopup")
    .addEventListener("click", closePopup);
document.querySelector('[type="submit"]').addEventListener('click', (event) => {
    event.preventDefault();

    // Fetch route URL
    const routeUrl = document.getElementById("route").getAttribute("data-route");

    // Gather form data
    const formData = new FormData();
    formData.append('_token', document.querySelector('input[name="_token"]').getAttribute('value'));
    formData.append('title', document.querySelector('[name="title"]').value);
    formData.append('sku', document.querySelector('[name="sku"]').value);
    formData.append('brand', document.querySelector('[name="brand"]').value);
    formData.append('description', document.querySelector('[data-placeholder="Product Description"]').innerText);
    formData.append('minimum_selling_price', document.querySelector('[name="minimum_selling_price"]').value);
    formData.append('comission', document.querySelector('[name="comission"]').value);
    formData.append('weight', document.querySelector('[name="weight"]').value);
    formData.append('category_id', document.querySelector('#category-org').selectedOptions[0].value);

    document.querySelectorAll('#Stock').forEach(element => {
        formData.append('stock[]', Number(element.value));
        return
    });
    // Get selected countries
    const selectedCountries = document.querySelectorAll(".country")
    selectedCountries.forEach(countryField => {
        formData.append('country[]', countryField.selectedOptions[0].value);
    });

    // Get image file
    const imageFile = document.querySelector('[name="image"]').files[0];
    if (imageFile) {
        formData.append('image', imageFile);
    }

    // Send POST request
    fetch(routeUrl, {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {

            if (data.errors) {
                const errMsg = data.errors[0].message
                openPopup(errMsg)
            }
            // Handle response data here
            if (!data.errors) {
                console.log('Data stored successfully');
                window.location.href = "/admin/affiliate-products";
            }
        })
        .catch(error => console.error(error));
});

function closePopup() {
    document.getElementById("customPopup").style.display = "none";
    document.getElementById("overlay").style.display = "none";
    window.location.reload();
}

function openPopup(message) {
    document.getElementById("customPopup").style.display = "flex";
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popupContent").innerText = message;
}
