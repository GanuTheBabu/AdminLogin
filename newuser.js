const firebaseApp = firebase.initializeApp({
  apiKey: "AIzaSyB_NbGrDeEpUOlV9gipEUCC3XD1L_nEWKw",
  authDomain: "user-ad755.firebaseapp.com",
  projectId: "user-ad755",
  storageBucket: "user-ad755.appspot.com",
  messagingSenderId: "936720306576",
  appId: "1:936720306576:web:e30a82259f7de0daa2a315",
  measurementId: "G-QR604L1EG2"

});

const db = firebaseApp.firestore();
const auth = firebaseApp.auth();

const register = () => {
    const email = document.getElementById('email').value
    const password = document.getElementById('password').value

    auth.createUserWithEmailAndPassword(email, password)
    .then((res) => {
        console.log(res.user)
    })
    .catch((err) => {
        alert(err.message)
        console.log(err.code)
        console.log(err.message)
    })
    auth.createUserWithEmailAndPassword(email, password)
    .then((register) => {

      alert("Account created successfully!");
    })
    .catch((error) => {

      console.error('Registration error:', error);

    });

}