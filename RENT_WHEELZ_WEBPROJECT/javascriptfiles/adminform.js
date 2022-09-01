window.onload = ()=>{
		this.sessionStorage.setItem('username', 'root');
		this.sessionStorage.setItem('password', 'admin123');
	}

	var input = document.getElementsByName('admin_input');
	var login = document.getElementById('loginbtn');
	var adminform = document.querySelector('form');
	adminform.onsubmit = ()=>{return false;}

	login.onclick = ()=>{

		if ((input[0].value != "") && (input[1].value != ""))
		 {
		 	if ((input[0].value == sessionStorage.getItem('username')) && (input[1].value == sessionStorage.getItem('password')))
		 	 {
		 	 	adminform.onsubmit = ()=>{return 1;}
				  document.cookie = "username="+input[0].value;
				  document.cookie = "password="+input[1].value;
		 	 }
		 	 else
		 	 {
		 	 	if ((input[0].value != sessionStorage.getItem('username')) )
			 	 {
			 	 	input[0].nextElementSibling.textContent = "Username NOT matched";
					setTimeout(()=>{
						input[0].nextElementSibling.textContent = "";
					}, 3000);

			 	 }
			 	 if ((input[1].value != sessionStorage.getItem('password')) )
			 	 {
			 	 	input[1].nextElementSibling.textContent = "Wrong Password";
					setTimeout(()=>{
						input[1].nextElementSibling.textContent = "";
					}, 3000);

			 	 }

		 	 }

		 }
		else
		 {
			if (input[0].value == "")
			{
				input[0].nextElementSibling.textContent = "Username is empty";
				setTimeout(()=>{
					input[0].nextElementSibling.textContent = "";
				}, 3000);
			}
			if (input[1].value == "")
			{
				input[1].nextElementSibling.textContent = "Password is empty";
				setTimeout(()=>{
					input[1].nextElementSibling.textContent = "";
				}, 3000);
			}
		 }
	}
