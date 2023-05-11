const handleTapDashBoard = () => {
  const optionsFullYear = { day: "numeric", month: "numeric", year: "numeric" };
  const optionsNotYear = { day: "numeric", month: "numeric" };

  if (document.querySelector("#day-title-box")) {
    const titleDayBox = document.querySelector("#day-title-box");
    const titleDayArrow = titleDayBox.querySelector("th:first-child");

    const handleClickArrow = () => {
      // Min btn
      const minDayBtn = document.querySelector("#min-day--btn");
      const maxDayBtn = document.querySelector("#max-day--btn");
      let currentNumDays = 6;
      let oldNumDays = 0;

      minDayBtn.addEventListener("click", function (e) {
        if (currentNumDays > oldNumDays) {
          currentNumDays = currentNumDays - 6;
          oldNumDays = currentNumDays - 1;
        }
        oldNumDays = currentNumDays - 1;
        currentNumDays = currentNumDays - 7;
        insertTitleDay(currentNumDays, oldNumDays);
        handleItemActive();
      });
      maxDayBtn.addEventListener("click", function (e) {
        if (currentNumDays < oldNumDays) {
          currentNumDays = currentNumDays + 6;
          oldNumDays = currentNumDays - 1;
        }
        oldNumDays = currentNumDays + 1;
        currentNumDays = currentNumDays + 7;
        insertTitleDay(currentNumDays, oldNumDays);
        handleItemActive();
      });

      insertTitleDay(currentNumDays, 0);
    };

    const insertTitleDay = (numDay, oldNumDay) => {
      const currentDate = new Date();
      const dayTitle = document.querySelectorAll(".day-title");
      if (dayTitle) {
        dayTitle.forEach(function (item) {
          item.remove();
        });
      }

      if (numDay > oldNumDay) {
        // const numdaysCurrent = numDay - 6;
        for (let j = numDay; j >= oldNumDay; j--) {
          let nextWeek = new Date(
            currentDate.getTime() + j * 24 * 60 * 60 * 1000
          );
          const formattedDateNotYear = nextWeek.toLocaleDateString(
            "vi-VN",
            optionsNotYear
          );
          const formattedDateFullYear = nextWeek.toLocaleDateString(
            "en-CA",
            optionsFullYear
          );
          const thElement = document.createElement("th");
          if (j == oldNumDay) {
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
      } else {
        for (let j = oldNumDay; j >= numDay; j--) {
          let nextWeek = new Date(
            currentDate.getTime() + j * 24 * 60 * 60 * 1000
          );
          const formattedDateNotYear = nextWeek.toLocaleDateString(
            "vi-VN",
            optionsNotYear
          );
          const formattedDateFullYear = nextWeek.toLocaleDateString(
            "en-CA",
            optionsFullYear
          );
          const thElement = document.createElement("th");
          if (j == numDay) {
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
      }

      activeTapDay();
    };

    const activeTapDay = () => {
      let flash = true;
      const tapBtn = document.querySelectorAll(".day-title");
      if (tapBtn) {
        for (let i = 0; i < tapBtn.length; i++) {
          tapBtn[i].addEventListener("click", function (item) {
            const tapActive = document.querySelector(".day-title.active");
            const itemActive = document.querySelectorAll(
              ".customer-day.active"
            );
            if (itemActive) {
              itemActive.forEach(function (item) {
                item.classList.remove("active");
              });
            }
            //

            // handleItemActive();

            //
            if (tapActive) {
              tapActive.classList.remove("active");
            }

            tapBtn[i].classList.add("active");
            const dataID = tapBtn[i].getAttribute("data-id");
            const dataTap = document.querySelectorAll(
              `[data-item="${dataID}"]`
            );
            if (dataTap) {
              dataTap.forEach(function (item) {
                item.classList.add("active");
              });
            }
          });
          if (flash) {
            const tapActive = document.querySelector(".day-title.active");
            const itemActive = document.querySelectorAll(
              ".customer-day.active"
            );
            if (itemActive) {
              itemActive.forEach(function (item) {
                item.classList.remove("active");
              });
            }
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

    const handleItemActive = () => {
      const itemActive = document.querySelectorAll(".customer-day.active");
      const tapActive = document.querySelector(".day-title.active");
      if (itemActive) {
        itemActive.forEach(function (item) {
          item.classList.remove("active");
        });
      }

      if (tapActive) {
        const dataID = tapActive.getAttribute("data-id");
        const dataTap = document.querySelectorAll(`[data-item="${dataID}"]`);
        if (dataTap) {
          dataTap.forEach(function (item) {
            item.classList.add("active");
          });
        }
      }
    };
    insertTitleDay();
    activeTapDay();
    handleClickArrow();
  }
};
handleTapDashBoard();
