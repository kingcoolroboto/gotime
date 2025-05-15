<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        #products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            border: 1px solid #ddd;
            padding: 10px;
            width: 300px;
        }
        .product img {
            width: 100%;
            height: auto;
        }
        .thumbnails {
            display: flex;
            gap: 5px;
            overflow-x: auto;
        }
        .thumbnails img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>

    <h2>Product List</h2>
    <div id="products"></div>
    <div id="discriptons"></div>
    <script>
        // Fetch the JSON file
    fetch('products.json')
            .then(response => response.json())
            .then(data => {
                if (data && data.products) {
                    const productsDiv = document.getElementById('products');

                    data.products.forEach(product => {
                        if (product.name === "Benyar Titan Chrono Quartz Stainless Steel Men's Watch") {
                        const productPIC = document.createElement('div');
                        productPIC.classList.add('product');
                        productPIC.innerHTML = `<img width="200px" height="200px" src="${product.mainpic}" alt="${product.name}">`

               const pictures = Array.isArray(product['5pictors']) ? product['5pictors'] : Object.values(product['5pictors'] || {});

                // Create container for additional images
               // const thumbnailsDiv = document.createElement('div');
               // thumbnailsDiv.classList.add('thumbnails');

                // Create and append <img> elements for each picture
                pictures.forEach(pic => {
                    const imgElem = document.createElement('img');
                    imgElem.src = pic;
                    imgElem.alt = "Extra Image";
                    productPIC.appendChild(imgElem);
                });
               // productDiv.appendChild(thumbnailsDiv);
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product');
                        productDiv.innerHTML = `
                            <p class="onsale" style="display:${product.onsale === "true" ? "grid" : "none"};" >On Sale</p>
                            <h3 class="h33" >${product.name}</h3>
                            <p class="Price">Price: R${product.prise}</p>
                            <p id="discriptons" class="discriptons" ></ p> 
                          <button  class="button" >Details </button> 
                          <button  class="button" >Add to Cart</button> 
                          </div>
                        `;
                var txtFile = new XMLHttpRequest();
                txtFile.open("GET", product.discripton, true);
                txtFile.onreadystatechange = function() {
                  if (txtFile.readyState === 4) {  // Makes sure the document is ready to parse.
                    if (txtFile.status === 200) {  // Makes sure it's found the file.
                      allText = txtFile.responseText; 
                      //lines = txtFile.responseText.split("\n"); // Will separate each line into an array
                      var customTextElement = document.getElementById('discriptons');
                        customTextElement.innerHTML = txtFile.responseText;
                    }
                  }
                }
                txtFile.send(null);

                        productsDiv.appendChild(productPIC);
                        productsDiv.appendChild(productDiv);
                        }
                    });
                } else {
                    document.getElementById('products').innerHTML = "Error loading products.";
                }
            })
            .catch(error => console.error('Error fetching products:', error));
    </script>

</body>
</html>

