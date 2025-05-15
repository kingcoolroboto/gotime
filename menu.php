<div class="menu" >
 <img class="logo" width="50px" height="50px" src="https://i.imghippo.com/files/bDPv6478o.png" alt="" loading="lazy">
 <div style="display:flex;gap:5px" >
 <button hx-get="./home.php" hx-target="#body"   class="menubutton display" >Home</button> 
 <button hx-get="./shop.php" hx-target="#body"   class="menubutton display" >Shop</button> 
      <div x-data="{ open: false }">
         <div @click="open = ! open" class="cart" >
          <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABT0lEQVRIS82UPy9EQRTFz91YhYZEpVBQ8gVIRCdR0VIoRNhN9BKhJKHfYu/qNNRUEo1C+AASaoVItqFT7XVGIvbf27nvrScmmfeKuXN+99w7M4Kch+Ssjz8EmFqTG4WUyr/h7sdBK4DasgDZuu4X0lki0x2KHgN2CSkv5QCojAIDrxQu0MUES/XcD6R7k01PKbqWXdhu6X4u7E8AnMwAjbvsADzS+VQyIKyYPvA7nRGyS8BRDFBiQDU9wBpAcRyy8RIDDDGgzhn+KYZdsf6L3xt632TTCgO3U6iHtq7y/pw7ATX2wEIvvOMNGByDrH/4AF/Nrt4wq3knoeOJiT92Vlsh5cwHKMxCNu+bYx0ALRLwRBeTEcgFj+Zye0wc4Es9McoHMD2gwh7nIbPcb1HrtRbOlCtBU54ODHO+EzDSBkheSwHI2YHLZvcgX4n+M+AT9E5aGYdVACoAAAAASUVORK5CYII="/>
         <div id="carttotal" ></div>
         </div> 

        <div  x-show="open" @click.outside="open = false" id="cartbox" class="cartbox" >
                <div class="tab-wrapper" x-data="{ activeTab:  0 }">
                      <div class="tab-panel" :class="{ 'active': activeTab === 0 }" x-show.transition.in.opacity.duration.600="activeTab === 0">
                         <div id="trolie"></div>
                      </div> 

                      <div class="tab-panel" :class="{ 'active': activeTab === 1 }" x-show.transition.in.opacity.duration.600="activeTab === 1">
                          <div class="flex">
                              <img  width="40%" height="150px" src="https://i.imghippo.com/files/Jwz1524jJA.png" alt="pament">
                              <img  width="40%" height="150px" src="https://i.imghippo.com/files/FO5231zj.png" alt="pament">
                          </div>
                      </div>

                      <div class="fcheakout">
                        <button class="cheakout" @click="activeTab = 0" class="tab-control":class="{ 'active': activeTab === 0 }">Back</button>
                        <button class="cheakout" @click="activeTab = 1" class="tab-control":class="{ 'active': activeTab === 1 }">Cheakout</button>
                      </div>
                </div>
         </div>
       </div>
      <div x-data="{ open: false }">
          <div  @click="open = ! open" style="font-size: 1em;"   class="menubutton destop" >
            <img style="width: 31px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAUElEQVRIS2NkoDFgpLH5DKMWEAzhAQii/zP/E3QWPgWM6SiOxvQBzS2gyPmYmgcgDmjuA5rHAc0toHkQDX0LaB4HNLdg6MfBqA/QQoDmpSkAzSESGQjsJ5cAAAAASUVORK5CYII="/>
         </div>
          <div  x-show="open" @click.outside="open = false" id="cartbox" class="menubox" >
           <button hx-get="./home.php" hx-target="#body"   class="menubutton " >Home</button> 
           <button hx-get="./shop.php" hx-target="#body"   class="menubutton " >Shop</button> 
          <div>
      </div>
</div>
