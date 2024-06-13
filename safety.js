const firebaseApp = firebase.initializeApp({
    apiKey: "AIzaSyBa1LsGJHUeosp6jh0uvZI0ynjv2khHBsY",
  authDomain: "safety-7cd40.firebaseapp.com",
  projectId: "safety-7cd40",
  storageBucket: "safety-7cd40.appspot.com",
  messagingSenderId: "2580361839",
  appId: "1:2580361839:web:7e21d8ca9df5b7ef92139a",
  measurementId: "G-BB7QB98XGK"
});

const db = firebaseApp.firestore();
const auth = firebaseApp.auth();


const login = () => {
    const email = document.getElementById('email').value
    const password = document.getElementById('password').value

    auth.signInWithEmailAndPassword(email, password)
    .then((res) => {
        console.log(res.user)
        window.location.href = "safetyhub.html";
    })
    .catch((err) => {
        alert(err.message)
        console.log(err.code)
        console.log(err.message)
    })
}