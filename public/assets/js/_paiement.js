
const container = document.querySelector("#_articlesPay");
const totalAff = document.querySelector("#_total");
const btnAnnul = document.querySelector("#_discard");
let totalArray = [];

let articles = window.articles;
let articlesChecked = JSON.parse(window.localStorage.getItem("_iTem_"));
if(container && articles){
    let i = 0;
    let html = "";
    Object.values(articles).map(arti => {
        articlesChecked.map(artiCh => {
            if(Number(artiCh) === Number(arti.id)){
                totalArray.push(Number(arti.prix));
                i++;
                html += `
                <div id="arti${i}" class="grid grid-cols-6 justify-between items-center gap-2 h-10 ">
                <h3 class="col-span-4 py-1 px-2 bg-gradient-to-tr  font-normal">${arti.name}</h3>
                <div>
                    <img src="/${arti.image_url}" class="w-8 h-8"/>
                </div>
                <span class="text-green-500">${arti.prix} €</span>
                </div>`
            }
        })
        
    })
    container.innerHTML = html;
    let totalPrice = totalArray.reduce((acc, value) => acc + value ,0);
    totalAff.textContent = totalPrice.toFixed(2) + "€";
}

if(btnAnnul){
    btnAnnul.addEventListener("click", () => {
        window.localStorage.removeItem("_iTem_");
        window.location.replace("/articles");
    });
}

window.addEventListener("load", () => {
    document.body.classList.add("bg-gradient-to-tr");
    document.body.classList.add("from-zinc-100");
    document.body.classList.add("to-violet-100");
})
