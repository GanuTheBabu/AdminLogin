const firebaseApp = firebase.initializeApp({
    apiKey: "AIzaSyAdj4xpS3RGSdWQh1DASf3NyZdDepa-4kg",
  authDomain: "admin-9d671.firebaseapp.com",
  projectId: "admin-9d671",
  storageBucket: "admin-9d671.appspot.com",
  messagingSenderId: "887122520575",
  appId: "1:887122520575:web:479083c624360801bcdfca",
  measurementId: "G-HYLDGF1HF5"

});

const db = firebaseApp.firestore();
const auth = firebaseApp.auth();

const login = () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    auth.signInWithEmailAndPassword(email, password)
    .then((res) => {
        console.log(res.user);
        window.location.href = 'admin_hub.html';
    })
    .catch((err) => {
        alert(err.message);
        console.log(err.code);
        console.log(err.message);
    });
};
