import animateItem, { counter, validation } from "./_auth.js";

const sectionParam = document.querySelector("#_dasboardSectionParamContainer");
const section = document.querySelector("#_dasboardSectionContainer");
const btnHistorique = document.querySelector("#_menuHistorique");
const removeAccount = document.querySelector("#_removeAccount");
const userPassConfModif = document.querySelector("#user_cmdp");
const userNameModif = document.querySelector("#user_nameM");
const titleEspaceClient = document.querySelector("#_titre");
const userPassModif = document.querySelector("#user_mdp");
const removeNext = document.querySelector("#_removeSuiv");
const optionsLi = document.querySelectorAll(".optionsLi");
const removePrec = document.querySelector("#_removePre");
const formP = document.querySelector("#_modifPassForm");
const btnParam = document.querySelector("#_menuParam");
const btnHidden = document.querySelector("#_minimize");
const removeEtap2 = document.querySelector("#_etap2");
const removeEtap1 = document.querySelector("#_etap1");
const btnShow = document.querySelector("#_maximize");
const checkBox = document.querySelector("#checkbox");
const formM = document.querySelector("#_modifForm");
const motif = document.querySelector("#motif");
const et1 = document.querySelector("#_et1");
const et2 = document.querySelector("#_et2");
let show = true;

btnHidden.addEventListener("click", function () {
    toggleHeader();
});

btnShow.addEventListener("click", function () {
    toggleHeader();
});


const header = btnHidden.parentElement.parentElement.parentElement
function toggleHeader() {
    let classH = header.getAttribute("class");
    if (!classH.includes(" translate-x")) {
        classH = classH + " translate-x-[-550px]";
        header.setAttribute("class", classH.replace("relative", "fixed"));
    } else {
        const index = classH.indexOf("translate-x-[-550px]");
        const newClassH = classH.slice(0, index).replace("fixed", "relative")
        header.setAttribute("class", newClassH);
    }
}

const dashboardOptions_ = {
    duration: 1500,
    ease: "ease-in-out",
    iterations: 1,
    direction: "alternate",
    fill: "forwards"
};

document.body.classList.add("overflow-hidden")
window.addEventListener("load", function () {
    const keyFrames = [
        { transition: "all .2s ease-in-out" },
        { transform: "translateX(400rem)" },
        { transform: "translateX(40rem)" },
        { transform: "translateX(22rem)" },
        { transform: "translateX(10rem)" },
        { transform: "translateX(0rem)" },
    ];
    const keyFramesSectionParam = [
        { transition: "all .2s ease-in-out" },
        { transform: "translateX(-400rem)" },
        { opacity: 1 },
        { transform: "translateX(-40rem)" },
        { transform: "translateX(-22rem)" },
        { transform: "translateX(-10rem)" },
        { transform: "translateX(0rem)" },
        { opacity: 1 },
        { transform: "translateY(-5rem)" },
        { opacity: 0.6 },
        { opacity: 0.2 },
        { transform: "translateY(-12rem)" },
        { opacity: 0 },
    ];

    if (section && sectionParam) {
        section.animate(keyFrames, dashboardOptions_);
        sectionParam.animate(keyFramesSectionParam, dashboardOptions_);
        document.body.classList.add("overflow-auto")

    }
});

let animateKeyFramesParm = [
    { opacity: 0 },
    { opacity: 1 },
    { opacity: 1 },
];
let animateKeyFramesHist = [
    { opacity: 0 },
    { opacity: 0.7 },
    { opacity: 1 },
];


if (btnHistorique && btnParam) {
    btnHistorique.addEventListener("click", function () {
        section.classList.remove("hidden");
        section.animate(animateKeyFramesHist, dashboardOptions_);
        sectionParam.classList.add("hidden");
        if (sectionParam.clientHeight > 138) {
            sectionParam.classList.add("hidden")
        } else {
            sectionParam.classList.replace("z-50", "-z50")
            section.classList.add("z-50");
        }
        toggleClassList(btnHistorique, btnParam);
    });
    btnParam.addEventListener("click", function () {
        const classZ = String(sectionParam.getAttribute("class")).includes("z-50")
        sectionParam.classList.remove("hidden");
        sectionParam.classList.add("z-50");
        section.classList.add("hidden");
        sectionParam.animate(animateKeyFramesParm, dashboardOptions_);
        toggleClassList(btnParam, btnHistorique);
    });
}

function toggleClassList(btn1, btn2) {
    if (btn1 || btn2) {
        btn1.classList.replace("text-slate-400", "text-white");
        btn1.classList.add("scale-110");
        btn1.classList.add("font-semibold");
        btn2.classList.remove("text-white");
        btn2.classList.add("text-slate-400");
        btn2.classList.remove("scale-110");
        btn2.classList.remove("font-semibold");
    }
}
if (optionsLi) {
    optionsLi.forEach((option) => {
        option.addEventListener("click", function () {
            let nextElement = option.nextElementSibling;
            if (String(nextElement.getAttribute("class")).includes("hidden")) {
                nextElement.classList.replace("hidden", "block");
            } else {
                nextElement.classList.replace("block", "hidden");
            }
        })

    })
}

if (formM && userNameModif || formP && userPassModif && userPassConfModif) {
    formM.addEventListener("submit", function (event) {
        event.preventDefault();
        const uName = validation(userNameModif);
        const formData = new FormData(formM);

        if (uName) {
            fetch("/profil/edit-name", {
                method: "POST",
                body: formData,
            }).then(response => response.json())
                .then(data => {
                    const div_ = document.createElement("div");
                    userNameModif.textContent = userNameModif.value;
                    userNameModif.parentElement.appendChild(div_);
                    if (data.success) {
                        div_.classList.add("text-green-600");
                        div_.style.color = "green";
                        if (div_.textContent === data.message) {
                            return;
                        }
                        div_.textContent = data.message;
                        counter(div_, 4, "/profil");
                    } else {
                        div_.classList.add("text-red-600");
                        div_.textContent = "Erreur sur la soumission. " + data.error;
                    }
                }).catch(error => console.error("Erreur AJAX : ", error))
        }
    });

    formP.addEventListener("submit", function (event) {

        event.preventDefault();
        const valP = validation(userPassModif);
        const valCP = validation(userPassConfModif);
        if (valCP === true && valP === true && userPassModif.value === userPassConfModif.value) {
            const formData = new FormData(formP);
            fetch("/profil/modifier-mot-de-passe", {
                method: "POST",
                body: formData
            }).then(res => res.json()).then(data => {
                const div_ = document.createElement("div");
                userPassModif.textContent = userPassModif.value;
                titleEspaceClient.appendChild(div_);
                div_.classList.add("text-xs");
                div_.classList.add("font-thin");
                div_.classList.add("text-center");
                if (data.success) {
                    div_.classList.add("text-green-600");
                    if (div_.textContent === data.message) {
                        return;
                    }
                    div_.textContent = data.message;
                    counter(div_, 4, "/profil");
                } else {
                    div_.classList.add("text-red-600");
                    div_.textContent = data.Error;
                    setTimeout(() => {
                        div_.textContent = "";
                        div_.remove();
                    }, 1000)


                }
            }).catch(err => console.error("Erreur sur la mise à jour du mot de passe : " + err));
        } else if (userPassModif.value !== userPassConfModif.value) {
            if (document.querySelector("#_erreur_mdp")) {
                return;
            }
            const div_ = document.createElement("div");
            div_.textContent = "Les mots de passes ne correspondent pas.";
            div_.classList.add("text-red-600");
            div_.classList.add("font-thin");
            div_.classList.add("text-xs");
            div_.id = "_erreur_mdp";
            titleEspaceClient.appendChild(div_);
            setTimeout(() => {
                div_.remove();
            }, 4000)
        }
    });


}

if (removeAccount) {
    removeAccount.addEventListener("click", function () {
        const conf = window.confirm("Etes-vous certain de votre choix ?");
        if (conf) {
            window.location.replace("/profil/remove-account");
        }
        return;

    });
}

const keyFramesRemove = [
    { opacity: 1 },
    { opacity: 0.6 },
    { opacity: 0.0 },
];
const options = {
    duration: 900,
    ease: "linear",
    iterations: 1,
}

if (removePrec || removeNext && et1 && et2) {
    et1.classList.replace("text-slate-400", "text-amber-400");

    removePrec.addEventListener("click", function () {
        removeEtap2.animate(keyFramesRemove, options);
        setTimeout(() => {
            removeEtap2.style.zIndex = -5;
            removeEtap1.style.opacity = 1;
            removeEtap1.style.zIndex = 5;
            et2.classList.replace("text-amber-400", "text-slate-400");
            et1.classList.replace("text-slate-400", "text-amber-400");
        }, 800)
    });
    removeNext.addEventListener("click", function () {
        if (motif.value.length > 4 || checkBox.checked === true) {
            motif.nextElementSibling.innerHTML = ""
            removeEtap1.animate(keyFramesRemove, options);
            setTimeout(() => {
                removeEtap1.style.opacity = -6;
                removeEtap1.style.zIndex = -6;
                removeEtap2.style.zIndex = 5;
                et1.classList.replace("text-amber-400", "text-slate-400");
                et2.classList.replace("text-slate-400", "text-amber-400");
                checkBox.checked = false;
            }, 800)
        } else {

            let motifChild = `<div class="text-start text-stone-800">Vous ne souhaitez pas donner votre avis ? <span class="text-green-500">Cliquez sur la case à cocher</span></div>`
            motif.nextElementSibling.innerHTML = motifChild;
        }

    });
}




if (removeEtap2) {
    removeEtap2.addEventListener("submit", (event) => {
        const m_d_p = document.querySelector("#mdp_suppression").value;
        const result = document.querySelector("._result");
        event.preventDefault();
        if (m_d_p.length < 5) {
            result.classList.add("text-red-600")
            result.classList.add("px-1")
            result.textContent = "Le mot de passe doit être au moins de 5 caractères";
        } else {

            /// REQUETE AJAX

            const formData = new FormData(removeEtap2);
            fetch("/profil/remove-account", {
                method: "POST",
                body: formData,
            }).then(response => response.json())
                .then(data => {
                    window.localStorage.removeItem("_iTem_");
                    window.localStorage.removeItem("_show_Cart");
                    if (data.success) {
                        if (result.textContent === data.message) {
                            return;
                        }
                        result.classList.add("text-green-600");
                        result.style.color = "green";
                        result.textContent = data.message;
                        counter(result, 4, "/logout");
                        removePrec.parentElement.remove();
                        
                    } else {
                        result.classList.add("text-red-600");
                        result.textContent = "Erreur sur la soumission. " + data.error;
                    }
                }).catch(error => console.error("Erreur AJAX : ", error))
        }
    })
}




window.addEventListener("load", () => {
    setTimeout(() => {
        toggleClassList(btnHistorique, btnParam);

    }, 1000);
    if (removeEtap2) {
        removeEtap2.style.zIndex = -5;
    }
})
