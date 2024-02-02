// toggle class active untuk account
const account = document.querySelector('.account');
document.querySelector('#account-button').onclick = (e) => {
    account.classList.toggle('active');
    e.preventDefault();
}

// klik di luar element
const acc = document.querySelector('#account-button');

document.addEventListener('click', function (e) {
    if (!acc.contains(e.target) && !account.contains(e.target)) {
        account.classList.remove('active');
    }
});

// ambil elemen - elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var container = document.getElementById('container-search');

// tambahkan event ketika keyword dituliskan
keyword.addEventListener('keyup', function () {
    // buat objek ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open("GET", "/ajax_game.php?keyword=" + keyword.value);
    xhr.send();

    // button wishlist
    document.addEventListener("DOMContentLoaded", function () {
        var wishlistButtons = document.querySelectorAll(".wishlist-button");

        wishlistButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                var gameID = this.getAttribute("data-gameid");
                addToWishlist(gameID);
            });
        });

        function addToWishlist(gameID) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_to_wishlist.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Tampilkan pesan sukses atau pesan dari server
                }
            };

            var data = "game_id=" + encodeURIComponent(gameID);
            xhr.send(data);
        }
    });


});




