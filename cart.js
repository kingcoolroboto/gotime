// merg ---------------------------------------------------------------------
function mergeAndDeduplicateProductsFromSession() {
            // Read raw products JSON string from sessionStorage
            const raw = sessionStorage.getItem("products");
            if (!raw) {
              console.warn("No products found in sessionStorage.");
              return [];
            }

            let products;
            try {
              products = JSON.parse(raw);
            } catch (e) {
              console.error("Failed to parse products from sessionStorage:", e);
              return [];
            }

            // Merge duplicates and sum `qt`
            const map = new Map();
            products.forEach(product => {
              const key = `${product.Name}|${product.Price}`;
              if (map.has(key)) {
                map.get(key).qt += product.qt;
              } else {
                map.set(key, { ...product });
              }
            });

            const deduplicated = Array.from(map.values());

            // Optional: Save back to sessionStorage
            sessionStorage.setItem("products", JSON.stringify(deduplicated));

            return deduplicated;
          }
// update cart total----------------------------------------------------------
        function updateCartTotal() {
          const raw = sessionStorage.getItem("products");
          let products = [];

          if (raw) {
            try {
              products = JSON.parse(raw);
            } catch (e) {
              console.error("Invalid JSON in sessionStorage:", e);
              return;
            }
          }

          // Calculate total
          const total = products.reduce((sum, product) => {
            return sum + (product.Price * product.qt);
          }, 0);

          // Format and update the DOM
          const totalElement = window.parent.document.getElementById("carttotal");
          if (totalElement) {
            totalElement.textContent = total.toLocaleString('en', {
              minimumFractionDigits: 2,
              maximumFractionDigits: 2
            });
          } else {
            console.warn('Element with id="carttotal" not found.');
          }
        }

// update trolie ---------------------------------------------------------------------------
            function updatetrollie() {
              // Read raw products JSON string from sessionStorage
              const raw = sessionStorage.getItem("products");
              if (!raw) {
                console.warn("No products found in sessionStorage.");
                return [];
              }

              let products;
              try {
                products = JSON.parse(raw);
              } catch (e) {
                console.error("Failed to parse products from sessionStorage:", e);
                return [];
              }

               const trolie = document.getElementById("trolie");
               trolie.innerHTML="";
               products.forEach(items => { 
                  let Price = items.qt *  items.Price 
                   Price = Price.toFixed(2); 
                  let Prise = (Price).toLocaleString('en'); 
                 const add = document.createElement("div");
                    add.classList.add("item");
                    //add.innerHTML=`hello`;
                    //add.innerHTML=`${items.Name},${items.Prise},${items.qt},`;
                    add.innerHTML=`
                   <div style="display:flex;gap:5px" >
                   <img  width="30px" height="30px" src="${items.img}" alt="masculine-welder-k31-replica-watches">
                   <div id="cartname" class="cartname" >${items.Name}</div> 
                   </div>
                   <div style="display:flex;justify-content: end;" >
                   <button id="add" class="add" onclick="addtocart('${items.Name}','${items.Price}','${items.Pic}')">➕</button> 
                   <div id="total" style="width: 30px;display: grid;place-items: center;" >${items.qt}</div> 
                   <button id="minus" class="add" onclick="reduceProductQuantityByName('${items.Name}')" >➖</button> 
                   <div id="amount" class="amount" >R ${Price} </div> 
                   <button id="remove" class="add" onclick="removeProductByName('${items.Name}')">❌</button> 
                   </div>
                    `;
                   trolie.appendChild(add);
                   updateCartTotal();
                  });
            }

//remove  product --------------------------------------------------------------
              function removeProductByName(productName) {
                const raw = sessionStorage.getItem("products");
                if (!raw) return;

                let products;
                try {
                  products = JSON.parse(raw);
                } catch (e) {
                  console.error("Invalid JSON in sessionStorage:", e);
                  return;
                }

                // Filter out products with matching name
                const updated = products.filter(p => p.Name !== productName);

                // Save back to sessionStorage
                sessionStorage.setItem("products", JSON.stringify(updated));
              updatetrollie();
              updateCartTotal()
              }
//reduse product --------------------------------------------------
            function reduceProductQuantityByName(productName) {
              const raw = sessionStorage.getItem("products");
              if (!raw) return;

              let products;
              try {
                products = JSON.parse(raw);
              } catch (e) {
                console.error("Invalid JSON in sessionStorage:", e);
                return;
              }

              const updated = products.map(p => {
                if (p.Name === productName) {
                  return { ...p, qt: p.qt - 1 };
                }
                return p;
              }).filter(p => p.qt > 0); 

              sessionStorage.setItem("products", JSON.stringify(updated));
              updatetrollie();
              updateCartTotal()
            }
//add to cart --------------------------------------------------
            function addtocart(name, price, img) {
              const raw = sessionStorage.getItem("products");
              let products = [];

              if (raw) {
                try {
                  products = JSON.parse(raw);
                } catch (e) {
                  console.error("Invalid JSON in sessionStorage:", e);
                }
              }

              // Check if the product already exists (match by name + price)
              const existing = products.find(p => p.Name === name && p.Price === price);

              if (existing) {
                existing.qt += 1;
              } else {
                products.push({ Name: name, Price: price, img: img, qt: 1 });
              }

              sessionStorage.setItem("products", JSON.stringify(products));
              updatetrollie();
              updateCartTotal()
            }
