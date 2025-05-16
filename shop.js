        // Fetch the JSON file
    fetch('products.json')
            .then(response => response.json())
            .then(data => {
                if (data && data.products) {
                    const deals = document.getElementById('deals');
                    data.products.forEach(product => {
                    if (product.onsale === "true") {
                        const dealsDiv = document.createElement('div');
                        dealsDiv.classList.add('product');

                        dealsDiv.innerHTML = `
                            <p class="onsale" style="display:${product.onsale === "true" ? "grid" : "none"};" >On Sale</p>
                            <img width="200px" height="200px" src="${product.mainpic}" alt="${product.name}">
                            <h3 class="h33" >${product.name}</h3>
                            <p class="Price">R${product.prise}</p>
                          <div style="display:flex;gap:5px" >
                            <div x-data="{ open: false }">
                            <button  class="button" @click="open = ! open" >
                            More Details 
                            </button > 
                            <div  x-show="open" @click.outside="open = false"  >
                               <div class="produckdetails" id="ppop">
                                  <iframe id="iframe" style="width:100%;height:100%;border:none" src="./product.html?Use_Id=${product.id}" ></iframe>' 
                               </div>
                            </div>
                            </div>
                          <button  class="button" onclick="addtocart('${product.name}','${product.prise}','${product.mainpic}')" >Add to Cart</button> 
                          </div>
                        `;

                        deals.appendChild(dealsDiv);
                       }
                    });
                    const productsDiv = document.getElementById('products');

                    data.products.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product');

                        productDiv.innerHTML = `
                            <p class="onsale" style="display:${product.onsale === "true" ? "grid" : "none"};" >On Sale</p>
                            <img width="200px" height="200px" src="${product.mainpic}" alt="${product.name}">
                            <h3 class="h33" >${product.name}</h3>
                            <p class="Price">R${product.prise}</p>
                          <div style="display:flex;gap:5px" >
                            <div x-data="{ open: false }">
                            <button  class="button" @click="open = ! open" >
                            More Details 
                            </button > 
                            <div  x-show="open" @click.outside="open = false"  >
                               <div class="produckdetails" id="ppop">
                                  <iframe id="iframe" style="width:100%;height:100%;border:none" src="./product.html?Use_Id=${product.id}" ></iframe>' 
                               </div>
                            </div>
                            </div>
                          <button  class="button" onclick="addtocart('${product.name}','${product.prise}','${product.mainpic}')" >Add to Cart</button> 
                          </div>
                        `;

                        productsDiv.appendChild(productDiv);
                    });
                } else {
                    document.getElementById('products').innerHTML = "Error loading products.";
                }
            })
            .catch(error => console.error('Error fetching products:', error));
