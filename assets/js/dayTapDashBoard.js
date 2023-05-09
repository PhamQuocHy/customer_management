const handleTapDashBoard = () => {
  const currentDate = new Date();
  const nextWeek = new Date();
  const optionsFullYear = { day: "numeric", month: "numeric", year: "numeric" };
  const optionsNotYear = { day: "numeric", month: "numeric" };
  let currentNumDays = 0;
  const titleDayBox = document.querySelector("#day-title-box");
  const titleDayArrow = titleDayBox.querySelector("th:first-child");

  const insertTitleDay = () => {
    for (let j = 6; j >= 0; j--) {
      nextWeek.setDate(currentDate.getDate() + j);
      const formattedDateNotYear = nextWeek.toLocaleDateString(
        "vi-VN",
        optionsNotYear
      );
      const formattedDateFullYear = nextWeek.toLocaleDateString(
        "en-CA",
        optionsFullYear
      );
      const thElement = document.createElement("th");
      if (j == 0) {
        thElement.classList.add("day-title", "active");
      } else {
        thElement.classList.add("day-title");
      }
      thElement.setAttribute("data-id", formattedDateFullYear);
      const spanElement = document.createElement("span");
      spanElement.innerHTML = `Ngày ${formattedDateNotYear}`;
      thElement.appendChild(spanElement);

      titleDayBox.insertBefore(thElement, titleDayArrow.nextSibling);
    }
  };

  const activeTapDay = () => {
    let flash = true;
    const tapBtn = document.querySelectorAll(".day-title");
    if (tapBtn) {
      for (let i = 0; i < tapBtn.length; i++) {
        tapBtn[i].addEventListener("click", function (item) {
          const tapActive = document.querySelector(".day-title.active");
          const itemActive = document.querySelectorAll(".customer-day.active");
          if (tapActive) {
            tapActive.classList.remove("active");
          }
          if (itemActive) {
            itemActive.forEach(function (item) {
              item.classList.remove("active");
            });
          }
          tapBtn[i].classList.add("active");
          const dataID = tapBtn[i].getAttribute("data-id");
          const dataTap = document.querySelectorAll(`[data-item="${dataID}"]`);
          if (dataTap) {
            dataTap.forEach(function (item) {
              item.classList.add("active");
            });
          }
        });
        if (flash) {
          const tapActive = document.querySelector(".day-title.active");
          if (tapActive) {
            const dataID = tapActive.getAttribute("data-id");
            const dataTap = document.querySelectorAll(
              `[data-item="${dataID}"]`
            );
            if (dataTap) {
              dataTap.forEach(function (item) {
                item.classList.add("active");
                flash = false;
              });
            }
          }
        }
      }
    }
  };
  insertTitleDay();
  activeTapDay();
};
handleTapDashBoard();
