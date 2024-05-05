// Function to create a new work experience element

let permitedCountries = 1;
document.addEventListener("DOMContentLoaded", function () {
    let countryData;

    countryData = document.getElementById("stock_container").getAttribute("data-country");
    const options = JSON.parse(countryData).map((country) => `<option value="${country.id}">${country.name}</option>`)

    function createStock() {
        if (permitedCountries >= options.length) {
            openPopup("Cannot add more than " + options.length + " stock");

            return
        }
        const stockContainer = document.querySelector("#stock_container");
        // Create the work experience element
        const stockDiv = document.createElement("div");
        stockDiv.classList.add("row");
        stockDiv.classList.add("mb-4");
        stockDiv.classList.add("mt-4");
        const stockElements = `
  <div class="col">
      <div class="form-floating form-floating-outline">
      <select class="form-select form-select-lg country" name="country[]">
      <option>Large select</option>
      ${options}
    </select>
          <label for="country">Country</label>
      </div>
  </div>
  <div class="col">
      <div class="form-floating form-floating-outline mb-4">
          <input type="number" class="form-control" id="Stock"
              placeholder="Stock" name="stock[]"
              aria-label="Product discounted price" />
          <label for="Stock">Stock</label>
      </div>
  </div>
`;

        // HTML content for the work experience element
        stockDiv.innerHTML = stockElements;
        // Append the new work experience element to the container
        stockContainer.appendChild(stockDiv);
        permitedCountries++;
    }

    // Add

    document.getElementById("addstock").addEventListener("click", createStock);


});


