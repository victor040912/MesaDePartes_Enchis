console.log("text");

//TODO: Funcion para iniciar el proceso de inicio de sesion con Google
function startGoogleSignIn(){
    const auth = gapi.auth2.getAuthInstance();

    auth.signIn();
}

function handleCredentialResponse(response){

    $.ajax({
        type: 'POST',
        url: 'controller/usuario.php?op=registrargoogle',
        contentType: 'application/json',
        headers: {"Content-Type": "application/json"},
        data: JSON.stringify({
            request_type:'user_auth',
            credential: response.credential
        }),
        success: function(data){
            console.log(data);
            if(data === "0"){
                window.location.href = 'view/home'
            }else if (data === "1"){
                window.location.href = 'view/home'
            }     
        }
    })
    if(response && response.credential) {

        const credentialToken = response.credential;

        const decodeToken = JSON.parse(atob(credentialToken.split('.')[1]));

        console.log(decodeToken);

    }
}
