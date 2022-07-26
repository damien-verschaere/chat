document.addEventListener("DOMContentLoaded",()=>{

    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];


   
        btn.addEventListener("click", () => {
            modal.style.display = "block";
            

        })

   
        
        span.addEventListener("click", () => {
            modal.style.display = "none";
     
        })
  
        window.addEventListener("click", (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
  

})





})