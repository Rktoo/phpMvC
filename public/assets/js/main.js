import animateItem, { counter, keyframes_, options_ } from "./_auth.js";
import citationsMotivantes from "./data.js";



const formulaireDeRecherche = document.querySelector("#formulaireDeRecherche");
const removeFilterAndReplaceToHome = document.querySelector("#remove_filter");
const addToCartButtons = document.querySelectorAll(".add_to_cart_button");
const showCartItem = document.querySelector("#__showCartItem");
const messageInput = document.querySelector(".messageInput");
const log_Success = document.querySelector("#_log_Success");
let countItem = document.querySelector("#count_item");
const citation = document.querySelector("#_citation");
const logOut = document.querySelector("._logout");
const items = document.querySelectorAll(".itemS");
const cartBtn = document.getElementById("_pay");
const back = document.querySelector("#_back");
const body = document.querySelector("#_body");

let urlActif = (window.location.href).split(document.querySelector("#base_url").textContent)[1];
let data = getItem();
if (countItem) {
    countItem.textContent = data ? Number(data.length) : 0;
}
let show = Boolean(window.localStorage.getItem("_show_Cart")) ?? false;



const setLocalStorage = (itemChoosed) => {
    let itemChoosedFiltered = [...new Set(itemChoosed)];
    window.localStorage.setItem("_iTem_", JSON.stringify(itemChoosedFiltered));
    data = getItem();
}

addToCartButtons.forEach(button => {
    toogleChoice(button);
})

function toogleChoice(button) {
    button.addEventListener("click", () => {
        const id = button.parentElement.parentElement.parentElement.getAttribute("id");
        if (button.textContent == "Ajouter") {
            countItem.textContent = Number(countItem.textContent) + 1;
            button.textContent = "Retirer";
            button.setAttribute("style", `background-color:#F87171;`);
        } else {
            countItem.textContent = Number(countItem.textContent) - 1;
            button.textContent = "Ajouter";
            button.removeAttribute("style");
        }
        saveItem(id)
    })
}

////// Récupère les items depuis le stockage
items.forEach(product => {
    if (data) {
        data.forEach(item => {
            if (Number(product.getAttribute("id")) === Number(item)) {
                let button;
                if (urlActif === "articles" || urlActif.includes("?page=")) {
                    button = product.lastElementChild.lastElementChild.lastElementChild;
                    button.textContent = "Retirer";
                    button.setAttribute("style", `background-color:#F87171;`);
                } else {
                    button = document.querySelector("#singleButton");
                    button.textContent = "Retirer";
                    button.setAttribute("style", `background-color:#F87171;`);
                }
            }
        })
    }
})

function saveItem(id) {
    let itemChoosed = [];
    if (data) {
        data.map(pro => {
            if (Number(pro) === Number(id)) {
                const filtered = data.filter((item, index) => item !== id);
                let itemChoosedFiltered = [...new Set(filtered)];
                setTimeout(() => {
                    window.localStorage.setItem("_iTem_", JSON.stringify(itemChoosedFiltered));
                    data = getItem();
                }, 100)
                show = false;
                showCart(show);

            } else {
                itemChoosed.push(...data, id);
                setLocalStorage(itemChoosed);
            }
        })
    } else {
        itemChoosed.push(id);
        setLocalStorage(itemChoosed);
    }

    getArticlesChoosedToCart();

}


function getItem() {
    const loc = window.localStorage.getItem("_iTem_")
    if (!loc) {
        return null;
    } else if (Number(loc.length) === 2 && !loc.includes("id")) {
        window.localStorage.removeItem("_iTem_");
    }

    return JSON.parse(loc);
}

////// Animate countItem
function animateCountItem() {
    const keyframes = [
        { transform: "translateX(0)", opacity: 1 },
        { transform: "translateX(1px)", opacity: 0.5 },
        { transform: "translateX(-2px)", opacity: 0.8 },
        { transform: "translateX( 0)", opacity: 1 },
    ];
    const options = {
        duration: 2000,
        easing: "ease-in-out",
        iterations: Infinity,
        direction: "alternate",
        fill: "forwards"
    };

    
    let animation = countItem.animate(keyframes, options)

    if (countItem && Number(countItem.textContent) > 0) {
        animation.play();
    } else {
        setTimeout(() => {
            animation.pause();
        }, 300)
    }
}

if (countItem && Number(countItem.textContent) > 0) {
    animateCountItem();
}

////// Gere le formulaire de recherche
if (formulaireDeRecherche) {
    formulaireDeRecherche.addEventListener("submit", (event) => {
        const formInput = formulaireDeRecherche.children[1];
        if (formInput.value.trim() === "") {
            messageInput.textContent = "Merci de remplir le champ de recherche.";
            afficherMessageError();
            event.preventDefault();
            return;
        }
    })
}


const afficherMessageError = () => {
    const t = setTimeout(() => {
        messageInput.textContent = "";
    }, 1500)
    setTimeout(() => {
        clearInterval(t);
    }, 1600)
}
////// Remove Filter search
if (removeFilterAndReplaceToHome) {
    removeFilterAndReplaceToHome.addEventListener("click", () => {
        window.location.replace("/articles?page=1");
    });
}

/// Gestion du cart


if (cartBtn) {
    setInterval(() => {
        data = getItem();
        if (window.localStorage.getItem("_iTem_") && data.length > 0) {
            cartBtn.style.backgroundColor = "rgb(22, 163, 74)";
            cartBtn.style.cursor = "pointer";
            document.querySelector("#trash").style.color = "red";
            document.querySelector("#trash").style.cursor = "pointer";
        } else {
            document.querySelector("#trash").style.color = "#D1D5DB";
            document.querySelector("#trash").style.cursor = "not-allowed";
            cartBtn.style.backgroundColor = "#D1D5DB";
            cartBtn.style.cursor = "not-allowed";
            cartBtn.style.outline = "none";
            cartBtn.classList.add("inactive")
        }
    }, 200);

}

const cartItem = document.querySelector("#cartItem");
///// Dérouler la Cart
if (showCartItem) {
    showCartItem.addEventListener("click", () => {
        show = !show;
        if (show) {
            window.location.reload();
            showCart(show);
        } else {
            showCart(show);
        }
    });
}


function showCart(show = true) {
    if (show && cartItem && showCartItem) {
        cartItem.style.transform = "translateY(70px)";
        cartItem.style.opacity = "95";
        showCartItem.style.transform = "translateY(0)";
    } else {
        if (showCartItem) {
            showCartItem.style.transform = "translateY(-10px)";
            cartItem.style.transform = "translateY(0px)";
            cartItem.style.transform = "scale(20%)";
            cartItem.style.opacity = "0";
        }
    }

    window.localStorage.setItem("_show_Cart", show);
}

const articles = window.articles;

function getArticlesChoosedToCart() {
    const iC = [];
    if (data && articles) {
        data.map((item, index) => {
            articles.filter(article => {
                if (Number(article.id) === Number(item)) {
                    iC.push(article)
                }
            })
        })
        showItemToCart(iC)
    }
}


const cart = document.querySelector("#_carts");


function showItemToCart(iC) {
    let html = '';
    if (data && urlActif.includes("articles")) {
        for (let i = 0; i < data.length; i++) {
            if (Number(data[i]) === Number(iC[i].id)) {
                html += `<div class="flex flex-row gap-1 w-full bg-white px-4 py-1 rounded-lg shadow-md">
                <h2 class="text-start">${iC[i].name}</h2>
                <div class="flex justify-end items-center w-full">
                <span class="text-end text-green-400">${String(iC[i].prix).replace(".", ",")} €</span >
                </div >
                </div > `
            }
        }
        
        cart.innerHTML = html;
    }
}

/////// Bouton retour dans la page single
if (back) {
    back.onclick = () => window.location.replace("/articles");
}

const clearC = document.querySelector("#_clear_");
if (clearC) {
    clearC.addEventListener("click", function () {
        if (Number(countItem.textContent) < 1) return;
        window.localStorage.removeItem("_iTem_");
        window.location.reload();
    });
}

window.addEventListener("load", function () {
    getArticlesChoosedToCart();
    showCart()
})

if (log_Success) {
    animateItem(log_Success, keyframes_, options_);
}

if (citation) {
    generateCitation();
    setInterval(() => {
        generateCitation()
    }, 15000);
}

function generateCitation() {
    const nb = (Math.random() * citationsMotivantes.length).toFixed();
    citation.textContent = citationsMotivantes[nb];
}

if (logOut) {
    logOut.addEventListener("click", () => {
        window.localStorage.removeItem("_iTem_");
        window.localStorage.removeItem("_show_Cart");
    });
}

let modal = "";
if (cartBtn) {
    cartBtn.addEventListener("click", () => {
        createModal();
    })
}

function createModal() {
    if (window.user !== "_connecTed") {
        modal += `<div class="fixed inset-0 flex justify-center items-center mx-auto px-10 bg-gradient-to-bl from-stone-800/70 to-slate-800/75 text-lg tracking-widest text-white font-thin" style="z-index:200" id="_theModal">
        <div class="relative flex flex-col gap-4" style="z-index:200">
            <h1>Vous devez vous connecter afin de procéder au paiment de vos articles.</h1>
            <p class="text-sm flex flex-row gap-2">Vous serez redirigé dans <span id="_sec"></span>secondes</p>
        </div>
    </div>
            `;
        const h20 = document.querySelector("#_h20");
        h20.innerHTML = modal;
        body.classList.add("overflow-hidden");
        let i = 5;

        counter(document.querySelector("#_sec"), i)
    } else {
        const randomNumber = (Math.random() * 123456789).toFixed();
        window.location.replace(`/paiement/${randomNumber}`);
    }
}


window.addEventListener("load", function () {
    body.classList.remove("overflow-hidden");
    body.classList.add("overflow-auto");
});
