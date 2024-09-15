<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width= device-width, initial-scale= 1.0">

    <link
        rel="icon"
        href="https://drive.google.com/file/d/1l8TObqj_GIJrgDvcAB_fEPr67FyzUBC6/view?usp=drive_link" type="image/x-icon"/>

    <title>
        Loading
    </title>


    <style>
        ul {
            object-position: center;
            display: flex;
            gap: 1.2rem;
            list-style: none;
        }

        ul li {
            width: 60px;
            height: 60px;
            background: var(--colour);
            border-radius: 75%;
            animation: grow 1.6s ease-in-out infinite;
            animation-delay: var(--delay);
            box-shadow: 0 0 50px var(--colour);

        }

        @keyframes grow {

            0%,
            40%,
            100% {
                transform: scale(0.2);
            }

            20% {
                transform: scale(1);
            }
        }

        .loading {
            position: absolute;
            top: 40%;
            left: 28.5%;

        }

        body {
            background: linear-gradient(135deg, #c6e8f1, #e5f7fc)
        }

        footer  {
            position: absolute;
            top: 90%;
            left: 40%
        }
    </style>

</head>

<body>
<div class="loading">
    <ul>

        <li style="--delay: -1.4s; --colour: #ffff00"></li>

        <li style="--delay: -1.2s; --colour: #76ff03"></li>

        <li style="--delay: -1s; --colour: #f06292"></li>

        <li style="--delay: -0.8s; --colour: #4fc3f7"></li>

        <li style="--delay: -0.6s; --colour: #ba68c8"></li>

        <li style="--delay: -0.4s; --colour: #f57c00"></li>

        <li style="--delay: -0.2s; --colour: #673ab7"></li>

        <li style="--delay: 0s; --colour: #fff"></li>

    </ul>
</div>

<script>
    var timer = setTimeout(function(){window.location='/login'}, 5000);
</script>


<footer>
    <p>&copy; 2024 Wahid International.</p>
</footer>
<script> setTimeoutfunction [--delay]</script>

</body>
