$(document).ready(function() {

    $(".btn-login").on('click', () => {
        console.log("je suis dans le handler")
        let user = $(".inUser").val()
        let password = $(".inPass").val()
        console.log(user)
        console.log(password)

        $.post("./Model/loginModel.php", {
            a: "login",
            user: user,
            pass: password

        }, (data) => {
            if (data.login) {
                console.log("aaaaaaaaaaaaaaa")
                //window.location.href = "/AudiocbV2/dev/test_pierro/crud.php"
                window.location.href = "crud.php"
            } else {
                console.log("ccccccccccc")
                error()
                window.location.href = "index.php"

                return false

            }
        }, "json")

    })

})

function error() {
    $('.errorlogin').text("Mauvais login ou mot de passe")
}