/////// REGISTER
const runame = document.querySelector("#ruser_name");
const ruemail = document.querySelector("#ruser_email");
const rupassword = document.querySelector("#ruser_password");
const rform = document.querySelector("#r_informatikForm");


////// LOGIN
const luemail = document.querySelector("#luser_email");
const lupassword = document.querySelector("#luser_password");
const lform = document.querySelector("#l_informatikForm");

const valeurMinimum = 4;
const url = window.location.href;
const eye = document.querySelector("#_mdp_eye");
let show = false;
const registerSuccess = document.querySelector("#_success");
const log_Error = document.querySelector("#_log_Error");


if (url.includes("/register")) {
    rform.addEventListener("submit", (event) => {
        validation(runame);
        validation(ruemail);
        validation(rupassword);
    });
} else if (url.includes("/login")) {
    lform.addEventListener("submit", (event) => {
        validation(luemail);
        validation(lupassword);
    })
}


export function validation(element) {
    if (element.value.trim() === "" || element.value.trim().length < valeurMinimum) {
        event.preventDefault();
        if (element.nextElementSibling) {
            return;
        }
        const message = document.createElement("div");
        getMessage(message, element);
        message.classList.add("md:text-center");
        message.classList.add("_messageError");
        message.classList.add("text-red-400");
        message.classList.add("text-start");
        message.classList.add("text-xs");
        message.classList.add("mt-1");
        element.parentElement.appendChild(message);
        if (element.nextElementSibling) {
            setTimeout(() => {
                element.nextElementSibling.remove();
            }, 2500)
        }
        return false;
    }


    return true;
}

function getMessage(message, element) {
    if (element.value.trim() === "" && element.value.trim().length < valeurMinimum) {
        message.textContent = `Merci de remplir le champ ${String(element.previousElementSibling.textContent).toLowerCase()}.`;
    } else if (element.value.trim().length < valeurMinimum) {
        message.textContent = `La valeur minimum est de ${valeurMinimum} caractères.`;
    }
}


if (eye) {
    eye.addEventListener("click", () => {
        show = !show;
        if (show) {
            if (rupassword && rupassword.value.length > 0) {
                eye.firstChild.setAttribute("src", "public/images/svg/s-eye-slash.svg");
                eye.nextElementSibling.nextElementSibling.setAttribute("type", "text");
            } else if (lupassword && lupassword.value.length > 0) {
                eye.firstChild.setAttribute("src", "public/images/svg/s-eye-slash.svg");
                eye.nextElementSibling.nextElementSibling.setAttribute("type", "text");
            }
        } else {
            eye.firstChild.setAttribute("src", "public/images/svg/s-eye.svg");
            if (lupassword) {
                eye.nextElementSibling.nextElementSibling.setAttribute("type", "password");
            } else {
                eye.nextElementSibling.nextElementSibling.setAttribute("type", "password");
            }
        }
    });
}

export const keyframes_ = [
    { opacity: 0.8 },
    { opacity: 0.7 },
    { opacity: 0.5 },
    { opacity: 0.75 },
    { opacity: 1 },
];
export const options_ = {
    duration: 1500,
    easing: "ease-in-out",
    iterations: Infinity,
    direction: "alternate",
    fill: "forwards"
};


if (registerSuccess) {
    const p = createElement("p", "Vous serez redirigé vers la page de connexion dans ", "text-center text-wrap font-thin");
    setTimeout(() => {
        registerSuccess.appendChild(p);
        counter(registerSuccess, i);
        animateItem(p, keyframes_, options_)
    }, 1000);
}


let animation_;
function animateItem(item, keyframes, option) {
    return animation_ = item.animate(keyframes, option);
}

let i = 5
export function counter(element, counT) {
    let count = createElement("p", counT, "text-center text-wrap font-thin");
    element.appendChild(count);
    setTimeout(() => {
        animateItem(count, keyframes_, options_);
    }, 500);

    setInterval(() => {
        count.textContent = i;
        (i > 0) ? i-- : 0;
        if (i === 0) {
            window.location.replace("/login");
        }

    }, 1000)
}
function createElement(type, text_content, classe) {
    let name = document.createElement(type);
    name.textContent = text_content;
    name.setAttribute("class", classe);
    return name;
}

if (log_Error) {
    animateItem(log_Error, keyframes_, options_);
}

const rError = document.querySelector("#_rError");
if (window.localStorage.getItem("rError") && rError) {
    setTimeout(() => {
        rError.remove();
    }, 3000);
}

export default animateItem;