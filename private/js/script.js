const handleChangeTable = () => {
  for (let item of document.querySelectorAll(".main-table")) {
    item.classList.toggle("hidden");
  }
  document.querySelector(".main__right-button").classList.toggle("invisible");
  document.querySelector(".main__left-button").classList.toggle("invisible");
};

const mobileTableContainer = () => {
  document.querySelector(".main__left-button").classList.remove("hidden");
  document.querySelector(".main__right-button").classList.remove("hidden");
  document.querySelector(".main__left-button").classList.add("invisible");
  document.querySelector(".main__right-button").classList.remove("invisible");
  document.getElementById("currenciesCard").classList.remove("hidden");
  document.getElementById("commissionsCard").classList.add("hidden");

  let plan = document.getElementsByClassName("plans--card")[1];
  plan.scrollIntoView({ inline: "center" });
};

const tabletTableContainer = () => {
  document.querySelector(".main__right-button").classList.add("hidden");
  document.querySelector(".main__left-button").classList.add("hidden");
  document.getElementById("currenciesCard").classList.remove("hidden");
  document.getElementById("commissionsCard").classList.remove("hidden");
};

window.addEventListener("load", () => {
  const media = window.matchMedia(`(min-width: 800px)`);

  media.addEventListener("change", (e) => {
    if (e.matches) {
      tabletTableContainer();
    } else {
      mobileTableContainer();
    }
  });

  if (media.matches) {
    tabletTableContainer();
  } else {
    mobileTableContainer();
  }
});