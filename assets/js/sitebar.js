const activeSitebar = () => {
  const urlParams = new URLSearchParams(window.location.search);
  const searchQuery = urlParams.get("cate");
  if (searchQuery == "user") {
    const category = document.querySelector("#cateUser");
    category.classList.add("active");
    const elementShow = category.getElementsByTagName("a")[0];
    console.log(elementShow);
  }
};
activeSitebar();
