<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, shrink-to-fit=yes">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<!--favicon-->	
		<link rel="icon" href="icon/favicon.ico">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
		<style>
			html{
				background: url(img/thenote.jpg) no-repeat center center fixed;
				background-size: cover;
			}
			body{
				background: none;
			}
			.container{
				width: 30%;
				left: 40px;
				text-align: center;
			}
			#homePageContainer{
				margin-top: 10%;	
			}
			#login{
				font-weight: 600;
				color: black;
			}
			h1{
				font-size: 50px;
				color: #FFC30C;
				margin-bottom: 6%;
				font-weight:600;
			}
			#logo{
				font-size: 25px;
				color: #FFC30C;
				font-weight:600
			}
			#LogInForm{
				display: none;
			}
			#forms{
				cursor: pointer;
				color: darkblue;
				font-weight:700;
			}
			#forms:hover{
				text-decoration: underline;
				color: skyblue;
			}
			#intro{
				color: #fff;
				font-weight: 600;
				font-size: 16px;
				text-shadow: 0 0 15px black;
			}
			#aboutIt{
				font-size:14px;
				font-weight: 500;
				color: #fff;
			}
			
			#notebook{
				width: 100%;
				height: 100vh;
			}	

			#containerLogInPage{
				margin-top: 10px;
				width: 100%;
				height: 100%;
			}
			
			/*Media Queries*/
			@media (max-width: 576px) { 
				html{
					overflow: hidden;
				}
				body{
					height:100vh;
				}
				#homePageContainer{
					margin-top:10%;
					width: 20rem;
				}
			}
			@media (min-width: 576px) and (max-width: 767.98px) { 
			#homePageContainer{
					margin-top:5%;
					width: 25rem;
			}
			html{
				overflow: scroll;
			}
		}
		</style>
	<body>