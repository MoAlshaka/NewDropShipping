const data = [];
const minDimensions = [16, 10];
let columns = [
    {
        type: "calendar",
        title: "Order Date",
        width: 180,
    },
    {
        type: "text",
        title: "Store Refence *",
        width: 180,
    },
    {
        type: "text",
        title: "Store Name",
        width: 180,
    },
    {
        type: "dropdown",
        title: "Warehouse *",
        source: ["Ali mahdy", "Hossam", "Zayed", "Ahmed", "Mohamed"],
        width: 180,
    },
    {
        type: "text",
        title: "Customer Name *",
        width: 180,
    },
    {
        type: "numeric",
        title: "Customer Phone *",
        width: 180,
    },
    {
        type: "numeric",
        title: "Customer Phone 2",
        width: 180,
    },
    {
        type: "text",
        title: "Customer Email",
        width: 180,
    },
    {
        type: "text",
        title: "Customer Country *",
        width: 180,
    },
    {
        type: "text",
        title: "Customer City",
        width: 180,
    },
    {
        type: "text",
        title: "Customer Address",
        width: 180,
    },
    {
        type: "dropdown",
        title: "Items SKU *",
        width: 180,
        source: [
            "JIAW2697145",
            "UOP84932124",
            "XWAOL120957",
            "KLIQ1209687",
            "UI120952232",
        ],
    },
    {
        type: "numeric",
        title: "Quantity *",
        width: 180,
    },
    {
        type: "numeric",
        title: "Total *",
        width: 180,
    },
    {
        type: "dropdown",
        title: "Currncy *",
        source: ["MAD", "USD", "XOF"],
        width: 180,
    },
    {
        type: "text",
        title: "Notes",
        width: 180,
    },
];

document.addEventListener("DOMContentLoaded", function () {

    const countries = document.querySelector(`.excel_container`).getAttribute("data-country");
    const sku = document.querySelector(`.excel_container`).getAttribute("data-sku");
    console.log(countries);
    columns[3].source = countries.split(",");
    columns[11].source = sku.split(",");

});


let myTable = jspreadsheet(document.getElementById("spreadsheet"), {
    data: data,
    minDimensions: minDimensions,
    columns: columns,
});
