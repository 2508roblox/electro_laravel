@extends('layout.admin')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    #searchInput{
        position: fixed;
        /* position: absolute; */
        bottom: 10px;
        z-index: 2;
    }
</style>
<div id="top" class="sa-app__body" data-openai-key="{{ env('KEY_OPENAI') }}">
    <div class="py-5 py-md-6 my-2 px-5">
        <div class="sa-hero-header">
            <div class="sa-hero-header__title">
                <h1>Electro AI</h1>
            </div>
            <div class="sa-hero-header__controls">
                <div class="col-auto d-flex " style="justify-content: center">
                    <input type="text" placeholder="Ask me anything" id="searchInput" class="form-control form-control--search-filled max-w-25x">
                    <button onclick="sendRequest()" class="btn btn-primary" id="myButton" style="margin-left: 10px">Ask</button>
                </div>
                <div id="resultContainer"></div>
            </div>
        </div>
    </div>
    <div class="container container--max--xl pb-6" id="resultContainer">
        <!-- Dùng phần này để cuộn kết quả -->
    </div>
</div>
<script>
    var openaiKey = document.getElementById("top").getAttribute("data-openai-key");

    function sendRequest() {
        var button = document.getElementById("myButton");

        // Lưu nội dung ban đầu của nút
        var originalButtonText = button.innerHTML;

        // Thay đổi nội dung của nút thành "Loading"
        button.innerHTML = "Loading...";

        // Vô hiệu hóa nút bằng cách thêm thuộc tính "disabled"
        button.setAttribute("disabled", "disabled");

        var searchQuery = document.getElementById("searchInput").value;
        document.getElementById("searchInput").value = "";

        var apiUrl = "https://api.openai.com/v1/chat/completions";

        $.ajax({
            url: apiUrl
            , method: "POST"
            , headers: {
                "Content-Type": "application/json"
                , "Authorization": 'Bearer ' + openaiKey
            , }
            , data: JSON.stringify({
                "model": "gpt-3.5-turbo"
                , "messages": [{
                        "role": "system"
                        , "content": "You are a helpful assistant."
                    }
                    , {
                        "role": "user"
                        , "content": searchQuery
                    }
                ]
            })
            , success: function(response) {
                var answer = response.choices[0].message.content;

                // Hiển thị câu hỏi và câu trả lời
                displayResult(searchQuery, answer);

                // Đặt lại nội dung ban đầu của nút
                button.innerHTML = originalButtonText;

                // Bỏ vô hiệu hóa nút bằng cách xóa thuộc tính "disabled"
                button.removeAttribute("disabled");
            }
            , error: function(error) {
                console.log(error); // Xử lý lỗi nếu có

                // Đặt lại nội dung ban đầu của nút
                button.innerHTML = originalButtonText;

                // Bỏ vô hiệu hóa nút bằng cách xóa thuộc tính "disabled"
                button.removeAttribute("disabled");
            }
        });
    }

    function displayResult(question, answer) {
        // Tạo một phần tử mới chứa câu hỏi và câu trả lời
        var newCard = document.createElement("div");
        newCard.className = "col d-flex";
        newCard.innerHTML = `
            <div class="card w-100">
                <div class="card-body p-5">
                    <h2 class="fs-exact-17">${question}</h2>
                    ${answer}
                </div>
            </div>
        `;

        // Lấy phần tử chứa các câu hỏi và câu trả lời
        var resultContainer = document.getElementById("resultContainer");

        // Chèn phần tử mới vào cuối danh sách
        resultContainer.appendChild(newCard);

        // Cuộn xuống dưới cùng của phần kết quả
        resultContainer.scrollTop = resultContainer.scrollHeight;
    }

    document.getElementById("searchInput").addEventListener("keydown", function(event) {
        // Kiểm tra xem phím được nhấn có phải là phím Enter không (mã phím 13)
        if (event.keyCode === 13) {
            // Ngăn chặn hành động mặc định của phím Enter (chẳng hạn như submit form)
            event.preventDefault();

            // Gọi hàm sendRequest khi nhấn Enter
            sendRequest();
        }
    });

</script>
@endsection
