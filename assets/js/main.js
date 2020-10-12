let newuser = document.getElementById("button");
newuser.addEventListener("click", loaduser);

function loaduser() {
  $("html, body").animate({ scrollTop: $(document).height() }, 1000);

  let xhr = new XMLHttpRequest();

  xhr.open("GET", "../php/process.php", true);

  $("div.users")
    .html(xhr)
    .delay(30000)
    .queue(function () {
      new loaduser();
    });

  xhr.onload = function () {
    if (this.status == 200) {
      let user = JSON.parse(this.response);
      let output = "";
      for (let i in user) {
        console.log(user);
        console.log(user.length);
        let img = `..//img/${user[i].img}`;
        output += `<div class="main">
                                    <ul class="cards">
                                        <li class="cards_item">
                                          <div class="card">
                                            <div class="card_image"><img src="${img}"/></div>
                                              <div class="card_content">
                                                <h2 class="card_title">${user[i].title}</h2>
                                                <p class="card_text">${user[i].description}</p>
                                              </div>
                                          </div>
                                        </li>
                                      </ul>
                                  </div>`;
      }

      document.getElementById("users").innerHTML = output;
    }
  };
  xhr.send();
}
