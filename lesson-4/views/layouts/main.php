<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: DodgerBlue;
        justify-content: space-around;
        }

        .flex-container > div {
        display: flex;
        flex-direction: row;
        background-color: #f1f1f1;
        width: 100px;
        margin: 10px;
        text-align: center;
        line-height: 75px;
        font-size: 30px;
        }
        .flex-container {
        display: flex;
        flex-direction: column;
        background-color: DodgerBlue;
        justify-content: space-between;
        text-align: center;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".buy").on('click', function () {
                let id = $(this).attr('data-id');
                (async () => {
                    const response = await fetch('/api/buy/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        }),
                    });
                    const answer = await response.json();
                    $('#counter').html(answer.count);
                    console.log(answer);
                })();
       });

            $(".delete").on('click', function (e) {
                let id = e.target.id;
                (async () => {
                    const response = await fetch('/api/deleteFromBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        }),
                    });
                    const answer = await response.json();
                    $('#item_' + answer.id).remove();
                    $('#counter').html(answer.count);
                    $('#summ').html(answer.summ);
                    console.log(answer);
                })();

            });
        });
    </script>
</head>
<body>
<?=$menu?><br>
<?=$content?>
</body>
</html>