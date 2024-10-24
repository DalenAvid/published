{{-- 
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деталі замовлення</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f6f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }
     
        .left-side {  
             flex: 1;
            background-color: #fff; 
            width: 80%; 
            margin: 0 auto;
             padding: 20px;
         }
  .title { font-size: 24px; text-align: center; margin-bottom: 20px; }
  .item { display: flex; justify-content: space-between; align-items: center; padding: 10px; 
    border-bottom: 1px solid lightgray; }
  .item img { width: 100px; height: auto; }
  .item-details { flex: 1; margin-left: 20px; }
  .item-title { font-size: 18px; }
  .item-author { font-size: 14px; color: gray; }
  .item-price { font-size: 18px; color: red; }
  .button { background-color: black; color: white; padding: 10px; border: none; cursor: pointer; margin-top: 20px; }

        .right-side { flex: 1; display: flex; justify-content: center; align-items: center; background-color: #f9f6f4; }
  .order-form { width: 400px; padding: 20px; background-color: #fff; border: 1px solid #e0e0e0; border-radius: 8px; }
  .order-form h2 { font-size: 24px; color: #6d4831; margin-bottom: 20px; text-align: left; }
  .order-form label { font-size: 14px; color: #6d4831; display: block; margin-bottom: 5px; }
  .order-form input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #d3a992; border-radius: 5px; font-size: 14px; color: #6d4831; }
  .form-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
  .half-width { width: 48%; display: flex; align-items: center; justify-content: center; border: 1px solid #d3a992; border-radius: 5px; padding: 10px; background-color: #f9f6f4; cursor: pointer; transition: background-color 0.3s; margin-right: 10px; }
  .half-width:last-child { margin-right: 0; }
  .half-width input[type="radio"] { display: none; }
  .half-width label { font-size: 14px; color: #6d4831; }
  .half-width input[type="radio"]:checked + label { background-color: #d3a992; color: #fff; border-radius: 5px; }
  .order-form input[type="submit"] { background-color: #a67656; color: #fff; cursor: pointer; border: none; transition: background-color 0.3s ease; }
  .order-form input[type="submit"]:hover { background-color: #8c5d44; }
  .total-price { font-size: 18px; font-weight: bold; margin-bottom: 15px; color: #000; }
    </style>
</head>
<body>

<div class="container">
    <div class="left-side">
        <div class="left-side">
            <div class="title">Ваш кошик</div>
            
            <div class="item">
              <img src="https://bookclub.ua/images/db/goods/d/62374_124451_d.jpg" alt="Думай і багатій">
              <div class="item-details">
                <div class="item-title">Убивство в маєтку Голлов</div>
                <div class="item-author">А. Крісті</div>
              </div>
              <div class="item-price">300.00 грн</div>
            </div>
            
            
          </div>
    </div>

    <div class="right-side">
        <div class="right-side">
            <form class="order-form" action="/checkout" method="post">
              @csrf
              <h2>Деталі замовлення</h2>
              <label for="phone">Номер телефону</label>
              <input type="text" id="phone" name="phone" placeholder="+38(066)222-21-21" required>
              <label for="address">Поштове відділення</label>
              <input type="text" id="address" name="address" placeholder="Відділення №1, вул. Вільський Шлях, 24" required>
              <label for="card_type">Тип картки</label>
              <div class="form-row">
                <div class="half-width">
                  <input type="radio" id="visa" name="card_type" value="Visa" required>
                  <label for="visa">Visa</label>
                </div>
                <div class="half-width">
                  <input type="radio" id="mastercard" name="card_type" value="MasterCard" required>
                  <label for="mastercard">MasterCard</label>
                </div>
              </div>
              <label for="card_number">Номер картки</label>
              <input type="text" id="card_number" name="card_number" placeholder="2222 1818 3231 0908" required>
              <div class="form-row">
                <div class="half-width">
                  <label for="expiry_date">Термін дії</label>
                  <input type="text" id="expiry_date" name="expiry_date" placeholder="09/28" required>
                </div>
                <div class="half-width">
                  <label for="cvv">Cvv</label>
                  <input type="text" id="cvv" name="cvv" placeholder="000" required>
                </div>
              </div>
              <div class="total-price">Всього до сплати: 3000 грн</div>
              <input type="submit" value="Оформити замовлення">
            </form>
    </div>
</div>

</body>
</html> --}}





<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Деталі замовлення</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f6f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }
       
        .left-side {  
             flex: 1;
            background-color: #fff; 
            width: 80%; 
            margin: 0 auto;
             padding: 20px;
         }
  .title { font-size: 24px; text-align: center; margin-bottom: 20px; }
  .item { display: flex; justify-content: space-between; align-items: center; padding: 10px; 
    border-bottom: 1px solid lightgray; }
  .item img { width: 100px; height: auto; }
  .item-details { flex: 1; margin-left: 20px; }
  .item-title { font-size: 18px; }
  .item-author { font-size: 14px; color: gray; }
  .item-price { font-size: 18px; color: red; }
  .button { background-color: black; color: white; padding: 10px; border: none; cursor: pointer; margin-top: 20px; }
 
        .right-side { flex: 1; display: flex; justify-content: center; align-items: center; background-color: #f9f6f4; }
  .order-form { width: 400px; padding: 20px; background-color: #fff; border: 1px solid #e0e0e0; border-radius: 8px; }
  .order-form h2 { font-size: 24px; color: #6d4831; margin-bottom: 20px; text-align: left; }
  .order-form label { font-size: 14px; color: #6d4831; display: block; margin-bottom: 5px; }
  .order-form input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #d3a992; border-radius: 5px; font-size: 14px; color: #6d4831; }
  .form-row { 
    display: flex;
    justify-content: space-between; 
    align-items: center;
     margin-bottom: 15px;
     
     }
  .half-width { width: 48%; display: flex; align-items: center; justify-content: center; border: 1px solid #d3a992; border-radius: 5px; padding: 10px; background-color: #f9f6f4; cursor: pointer; transition: background-color 0.3s; margin-right: 10px; }
  .half-width:last-child { margin-right: 0; }
  .half-width input[type="radio"] { display: none; }
  .half-width label { font-size: 14px; color: #6d4831; }
  .half-width input[type="radio"]:checked + label { background-color: #d3a992; color: #fff; border-radius: 5px; }
  .order-form input[type="submit"] { background-color: #a67656; color: #fff; cursor: pointer; border: none; transition: background-color 0.3s ease; }
  .order-form input[type="submit"]:hover { background-color: #8c5d44; }
  .total-price { font-size: 18px; font-weight: bold; margin-bottom: 15px; color: #000; }
    </style>
</head>
<body>

<div class="container">
    <div class="left-side">
        <div class="left-side">
            <div class="title">Ваш кошик</div>
            @if(session('cart'))
            @foreach(session('cart') as $id => $book)
            <div class="item">
                <img src="{{ asset('storage/covers/' . $book['image_url']) }}" alt="{{ $book['title'] }}">
                <div class="item-details">
                    <div class="item-title">{{ $book['title'] }}</div>
                    <div class="item-author">{{ $book['author'] }}</div>
                    <div class="item-price">{{ $book['price'] }} грн</div>
                    <div>Кількість: {{ $book['quantity'] }}</div>
                </div>
            </div>
            @endforeach
            
        @else
            <p>Ваш кошик порожній.</p>
        @endif
                    
          
          </div>
    </div>

    <div class="right-side">
        <div class="right-side">
            <form class="order-form" action="/checkout" method="post">
              @csrf
              <h2>Деталі замовлення</h2>
              <label for="phone">Номер телефону</label>
              <input type="text" id="phone" name="phone" placeholder="+38(066)222-21-21" required>
              <label for="address">Поштове відділення</label>
              <input type="text" id="address" name="address" placeholder="Відділення №1, вул. Вільський Шлях, 24" required>
              <label for="card_type">Тип картки</label>
              <div class="form-row">
                <div class="half-width">
                  <input type="radio" id="visa" name="card_type" value="Visa" required>
                  <label for="visa">Visa</label>
                </div>
                <div class="half-width">
                  <input type="radio" id="mastercard" name="card_type" value="MasterCard" required>
                  <label for="mastercard">MasterCard</label>
                </div>
              </div>
              <label for="card_number">Номер картки</label>
              <input type="text" id="card_number" name="card_number" placeholder="2222 1818 3231 0908" required>
              <label for="expiry_date" class="expiry-label">Термін дії</label>
              <label for="cvv" class="expiry-label" style="margin-left:210px;margin-top:-22px;">Cvv</label>
              <div class="form-row">
                <div class="half-width">
                  <input type="text" id="expiry_date" name="expiry_date" placeholder="09/28" required>
                </div>
                <div class="half-width">
                  <input type="text" id="cvv" name="cvv" placeholder="000" required>
                </div>
              </div>
              <div class="total-price">Всього до сплати: 3000 грн</div>
              <input type="submit" value="Оформити замовлення">
            </form>
    </div>
</div>

</body>
</html>
