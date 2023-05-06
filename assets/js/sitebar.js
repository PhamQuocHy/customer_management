const activeSitebar = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const cateQuery = urlParams.get("cate");
  const actionQuery = urlParams.get("action");
  if (cateQuery == "user") {
    const category = document.querySelector("#cateUser");
    category.classList.add("active");
    const navlink = category.getElementsByTagName("a")[0];
    const elementShow = category.querySelector("#ui-basic");
    elementShow.classList.add("show");
    const navItem = category.querySelectorAll(".sub-navLink");
    for (let index = 0; index < navItem.length; index++) {
      let string = navItem[index].getAttribute("href");
      const start = string.indexOf("action=") + 7; // vị trí bắt đầu của giá trị "action"
      const end = string.indexOf("&", start); // vị trí kết thúc của giá trị "action"
      const action = string.substring(start, end);
      if (actionQuery == action) {
        navItem[index].classList.add("active");
      }
    }
  } else if (cateQuery == "great") {
    const category = document.querySelector("#cateGreat");
    category.classList.add("active");
    const elementShow = category.querySelector("#greatItem");
    elementShow.classList.add("show");
    const navItem = category.querySelectorAll(".sub-navLink");
    for (let index = 0; index < navItem.length; index++) {
      let string = navItem[index].getAttribute("href");
      const start = string.indexOf("action=") + 7; // vị trí bắt đầu của giá trị "action"
      const end = string.indexOf("&", start); // vị trí kết thúc của giá trị "action"
      const action = string.substring(start, end);
      if (actionQuery == action) {
        navItem[index].classList.add("active");
      }
    }
  } else if (cateQuery == "service") {
    const category = document.querySelector("#cateService");
    category.classList.add("active");
    const elementShow = category.querySelector("#serviceItem");
    elementShow.classList.add("show");
    const navItem = category.querySelectorAll(".sub-navLink");
    for (let index = 0; index < navItem.length; index++) {
      let string = navItem[index].getAttribute("href");
      const start = string.indexOf("action=") + 7; // vị trí bắt đầu của giá trị "action"
      const end = string.indexOf("&", start); // vị trí kết thúc của giá trị "action"
      const action = string.substring(start, end);
      if (actionQuery == action) {
        navItem[index].classList.add("active");
      }
    }
  }
};
activeSitebar();
