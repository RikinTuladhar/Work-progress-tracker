<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Self Profile</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        main{
            display: grid;
            width: 100%;
            height: 100vh;
            grid-template-areas: "head head head "
                                "side content content"
                                "foot foot foot";
                                grid-template-rows: 73px auto 50px;


        }
        img{
            border: 1px solid black;
        }
        header{
            grid-area: head;
            background-color: red;
            height: 60px;
            padding: 20px;
            text-align: center;
            
        }
        article{
            grid-area: content;
            background-color: yellow;
        }
        article h2{
            margin-left: 30px;
        }
        aside{
            grid-area: side;
            background-color: green;
            padding: 40px;
            border: 3px solid black;
        }
        footer{
            grid-area: foot;
            background-color: pink;
        }
        .card{
            
            margin: 10px;
            padding-left: 40px;
            border: 1px solid red;
        }
        h3{
            margin-top: 10px;
        }
        .flex-box {
                     display: flex;
                      justify-content: space-evenly;
                     align-content: center;
                    flex-wrap: wrap;
                    margin: 20px;
        }
        .spacingtop{
            margin-top: 40px;
        }

    </style>
</head>
<body>
    <main>

        <header>
            <h1>Edit Profile</h1>
        </header>

        <aside>
            <div class="card">
                <h1>Professional Details</h1>
                <img src="icons_emp/employee.png" alt="profile" height="150px" width="150px">
                <div><h3>Name RAVI</h3></div>
                <div><h3>Age RAVI</h3></div>
                <div><h3>Location RAVI</h3></div>
                <div><h3>Experence RAVI</h3></div>
                <div><h3>Degree RAVI</h3></div>
                
            </div>
        </aside>



        <article>
        <div class="card">
           <h2>About Me</h2>
            <div class="card">
               <div class="flex-box">
                    <h4>Name:  Ravi</h4>
                   <h4>LastName:  Shrestha</h4>
                </div >
                <div class="flex-box">
                <h4>Location:  Dallu</h4>
                    <h4>Phone:  986934567</h4>
                </div>
                <div class="flex-box">
                    <h4>E-Mail:  Zira@gmail.com</h4>
                    <h4>Age:  14</h4>
                </div>
            </div>
        </div>
        <div class="card spacingtop">
        <h1>I am web Designer</h1>
        <div class="card">
        <p>Hello I like Playing games and listen to music</p>
        </div>
        </div>
        </article>
        <footer>Footer</footer>
    </main>
</body>
</html>