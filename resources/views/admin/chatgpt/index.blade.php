@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <div class="py-5 py-md-6 my-2 px-5">
            <div class="sa-hero-header">
                <div class="sa-hero-header__title">
                    <h1>Electro AI</h1>
                </div>
                <div class="sa-hero-header__controls">
                    <div class="col-auto d-flex " style="justify-content: center">
                        <input type="text" placeholder="Search over FAQ" id="searchInput"
                            class="form-control form-control--search-filled   max-w-25x">
                        <button onclick="sendRequest()" class="btn btn-primary" id="myButton"
                            style="margin-left: 10px">Send Request</button>
                    </div>
                    <div id="result"></div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                </div>
            </div>
        </div>
        <div class="container container--max--xl pb-6" id="resultContainer">
            <div class="row g-5 row-cols-1 row-cols-sm-2 row-cols-md-3"></div>
        </div>
    </div>
    <script>
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
                url: apiUrl,
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer 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"
                },
                data: JSON.stringify({
                    "model": "gpt-3.5-turbo",
                    "messages": [{
                            "role": "system",
                            "content": "You are a helpful assistant."
                        },
                        {
                            "role": "user",
                            "content": searchQuery
                        }
                    ]
                }),
                success: function(response) {
                    console.log(response); // In kết quả trả về từ API lên console
                    var answer = response.choices[0].message.content;

                    // Tạo một phần tử mới chứa câu hỏi và câu trả lời
                    var newCard = document.createElement("div");
                    newCard.className = "col d-flex";
                    newCard.innerHTML = `
                        <div class="card w-100">
                            <div class="card-body p-5">
                                <h2 class="fs-exact-17">${searchQuery}</h2>
                                ${answer}
                            </div>
                        </div>
                    `;

                    // Lấy phần tử chứa các câu hỏi và câu trả lời
                    var resultContainer = document.getElementById("resultContainer");

                    // Chèn phần tử mới vào đầu danh sách (dồn câu hỏi mới vào trên cùng)
                    resultContainer.insertBefore(newCard, resultContainer.firstChild);

                    // Đặt lại nội dung ban đầu của nút
                    button.innerHTML = originalButtonText;

                    // Bỏ vô hiệu hóa nút bằng cách xóa thuộc tính "disabled"
                    button.removeAttribute("disabled");
                },
                error: function(error) {
                    console.log(error); // Xử lý lỗi nếu có

                    // Đặt lại nội dung ban đầu của nút
                    button.innerHTML = originalButtonText;

                    // Bỏ vô hiệu hóa nút bằng cách xóa thuộc tính "disabled"
                    button.removeAttribute("disabled");
                }
            });
        }
    </script>
@endsection
