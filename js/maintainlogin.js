const firebaseApp = firebase.initializeApp({

    apiKey: "AIzaSyB6zEuLGvZ76RhClUZWOdLmRIlt_tvbh3o",
  authDomain: "maintenance-9f625.firebaseapp.com",
  projectId: "maintenance-9f625",
  storageBucket: "maintenance-9f625.appspot.com",
  messagingSenderId: "787849257113",
  appId: "1:787849257113:web:dabb44ab6a2ab1fe371808",
  measurementId: "G-RE3CEJG1ZE"
  
  });
  
  const db = firebaseApp.firestore();
  const auth = firebaseApp.auth();
  
  
  const login = () => {
      const email = document.getElementById('email').value
      const password = document.getElementById('password').value
  
      auth.signInWithEmailAndPassword(email, password)
      .then((res) => {
          console.log(res.user)
          window.location.href = "../maintaiance/maintainhub.html";
      })
      .catch((err) => {
          alert(err.message)
          console.log(err.code)
          console.log(err.message)
    })
}