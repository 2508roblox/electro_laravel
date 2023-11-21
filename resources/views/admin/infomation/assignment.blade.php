@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <div class="py-5 py-md-6 my-2 px-5">
            <div class="sa-hero-header">
                <div class="sa-hero-header__title">
                    <h1>Terms And Conditions</h1>
                </div>
                <div class="sa-hero-header__subtitle">This Agreement was last modified on 26 June 2021</div>
            </div>
        </div>
        <div class="container container--max--lg pb-6">
            <div class="card">
                <div class="card-body m-0 m-md-4 p-5">
                    <p>Electro là dự án website hàng đầu trong lĩnh vực bán thiết bị điện tử. Chúng tôi cung cấp một trải
                        nghiệm mua sắm trực tuyến tuyệt vời với sản phẩm công nghệ tinh tế và đáng tin cậy. Bạn có thể tìm
                        thấy các sản phẩm hàng đầu từ các thương hiệu uy tín và tận hưởng sự tiện lợi và độ tin cậy cao.
                        Giao diện trực quan và dễ sử dụng giúp bạn dễ dàng tìm kiếm và mua sắm các sản phẩm công nghệ với
                        giá cả phải chăng. Chúng tôi cung cấp các chức năng quản lý tiện lợi và hỗ trợ từ đội ngũ chăm sóc
                        khách hàng tận tâm. Bảo mật thông tin cá nhân và giao dịch là ưu tiên hàng đầu của chúng tôi.</p>



                    <h2>Functions</h2>

                    <ol style="list-style-type: none">
                        <li><strong>Client</strong> :
                            <ul style="list-style-type: decimal !important">

                                <li>Trợ lý ảo - Trợ giúp tự động thông qua trợ lý ảo</li>
                                <li>Xuất hóa đơn dạng pdf - Tạo hóa đơn dưới dạng tập tin PDF</li>
                                <li>Khuyến mãi và giảm giá - Các chương trình khuyến mãi và giảm giá sản phẩm</li>
                                <li>Giỏ hàng - Giỏ hàng cho các sản phẩm đã chọn</li>
                                <li>Đăng nhập và đăng ký - Quy trình đăng nhập và đăng ký tài khoản (sử dụng thông tin đăng
                                    nhập, Google, Facebook, vv.)</li>
                                <li>Quản lý tài khoản - Quản lý thông tin cá nhân và tài khoản</li>
                                <li>Thanh toán - Phương thức thanh toán</li>
                                <li>Ví điện tử - Ví điện tử (electro digital wallet, momo,...)</li>
                                <li>Ngân hàng - Ngân hàng (vnpay,..)</li>
                                <li>Thanh toán khi nhận hàng</li>
                                <li>Thanh toán bằng số dư trong ví electro digital wallet.</li>
                                <li>Đánh giá sản phẩm - Chức năng đánh giá và nhận xét về sản phẩm</li>
                                <li>Trang sản phẩm chi tiết - Trang hiển thị thông tin chi tiết về sản phẩm</li>
                                <li>Tin tức và thông tin - Cập nhật các tin tức và thông tin liên quan</li>
                                <li>Quản lý đơn hàng – Xem danh sách các đơn hàng</li>
                                <li>Thanh toán những đơn hàng đã tạo</li>
                                <li>Tìm kiếm và lọc sản phẩm - Tìm kiếm và sắp xếp sản phẩm theo tiêu chí</li>
                                <li>Tương thích di động - Phiên bản tương thích với các thiết bị di động</li>
                                <li>Danh mục sản phẩm</li>
                                <li>Danh mục con (Sub Category)</li>
                                <li>Thương hiệu sản phẩm</li>
                                <li>Gửi thông tin hóa đơn qua email - Gửi thông tin hóa đơn qua email</li>
                                <li>Hỗ trợ khách hàng - Dịch vụ hỗ trợ và chăm sóc khách hàng</li>
                                <li>Xem lịch sử giao dịch - Xem lại lịch sử các giao dịch đã thực hiện</li>
                                <li>Yêu thích sản phẩm - Danh sách các sản phẩm được đánh dấu là yêu thích</li>
                                <li>Form phản hồi - Mẫu để khách hàng gửi phản hồi</li>
                                <li>Recaptcha - Xác thực người dùng thông qua Recaptcha</li>
                                <li>OTP khi đăng kí bằng email - Gửi mã OTP cho xác thực khi đăng ký bằng email</li>
                                <li>Ví wallet của trang web - Quản lí và sử dụng ví điện tử trên trang web</li>
                                <li>Đánh giá sản phẩm - Cho phép người dùng đánh giá và viết nhận xét về sản phẩm</li>
                                <li>Quên mật khẩu - Quy trình phục hồi mật khẩu khi người dùng quên mật khẩu</li>
                                <li>Danh sách wishlist - Lưu trữ danh sách sản phẩm yêu thích của người dùng</li>
                                <li>Thay đổi mật khẩu - Cho phép người dùng thay đổi mật khẩu hiện tại</li>
                                <li>Xem tất cả hóa đơn đã mua - Xem danh sách các hóa đơn đã mua trên trang web</li>
                                <li>Nạp tiền vào ví wallet - Nạp tiền vào ví điện tử trên trang web</li>
                                <li>Xem bài viết - Hiển thị và đọc các bài viết trên trang web</li>
                                <li>Công cụ tìm kiếm sản phẩm - Cung cấp khả năng tìm kiếm sản phẩm trong trang web</li>
                                <li>Thay đổi thông tin tài khoản - Cho phép người dùng thay đổi thông tin cá nhân trong tài
                                    khoản của họ</li>
                            </ul>
                        </li>
                        <li><strong>Admin</strong> :
                            <ul style="list-style-type: decimal !important">
                                <li>Quản lý đơn hàng - Quản lý thông tin và trạng thái đơn hàng</li>
                                <li>Bảo mật thông tin - Đảm bảo an ninh và bảo mật thông tin khách hàng Hash Password</li>
                                <li>Trang quản trị - Giao diện quản lý hệ thống</li>
                                <li>Xuất hóa đơn dạng PDF - Tạo hóa đơn PDF</li>
                                <li>Gửi thông tin hóa đơn qua mail - Gửi hóa đơn qua email dạng PDF</li>
                                <li>Nhận thông báo mua hàng real-time - Nhận thông báo mua hàng ngay lập tức</li>
                                <li>Media quản lí hình ảnh website - Quản lý hình ảnh trên website</li>
                                <li>Đăng, quản lý mã coupon - Đăng, quản lý mã giảm giá</li>
                                <li>Chi tiết giao dịch - Hiển thị thông tin giao dịch</li>
                                <li>Quản lý danh mục (danh mục con) - Quản lý danh mục sản phẩm và các danh mục con</li>
                                <li>Quản lý khách hàng - Quản lý thông tin và hoạt động khách hàng</li>
                                <li>Quản lý slide - Quản lý và hiển thị slide</li>
                                <li>Quản lý biến thể sản phẩm - Quản lý biến thể sản phẩm</li>
                                <li>Quản lý phản hồi, feedback - Quản lý phản hồi khách hàng</li>
                                <li>Quản lý thông tin khách hàng - Quản lý thông tin cá nhân khách hàng</li>
                                <li>Quản lý bài viết blog, comment - Quản lý bài viết blog và comment</li>
                                <li>Đăng, chỉnh sửa thông tin sản phẩm - Đăng, chỉnh sửa thông tin sản phẩm</li>
                                <li>Nhắn tin giữa quản lý - Giao tiếp giữa quản lý</li>
                                <li>Quản lí file ảnh - Quản lí và lưu trữ file ảnh</li>
                                <li>Công cụ quản lí tasks - Quản lí và theo dõi các tasks</li>
                                <li>Chat GPT - Tích hợp chatbot hỗ trợ admin trong công việc</li>
                                <li>Quản lí email đã gửi và xem chi tiết - Quản lí và xem lại thông tin chi tiết về các
                                    email đã gửi</li>
                                <li>Quản lí source sự án - Quản lí và theo dõi các nguồn tài nguyên và thông tin liên quan
                                    đến dự án</li>
                                <li>Quản lí database và xem chi tiết từng bảng - Quản lí cơ sở dữ liệu và xem thông tin chi
                                    tiết từng bảng</li>
                            </ul>
                        </li>

                    </ol>

                    <h2>Technologies</h2>
                    <ol>
                        <li><strong>LANGUAGES</strong> — <img
                                src="https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&amp;logo=html5&amp;logoColor=white"
                                alt="HTML5"><img
                                src="https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&amp;logo=css3&amp;logoColor=white"
                                alt="CSS3"><img
                                src="https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&amp;logo=javascript&amp;logoColor=%23F7DF1E"
                                alt="JavaScript"><img
                                src="https://camo.githubusercontent.com/b7e290d2aeff9829bba45e897265ceebd34b25f6f7efba4b08e1b23cfe0815e7/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f7068702d2532333737374242342e7376673f7374796c653d666f722d7468652d6261646765266c6f676f3d706870266c6f676f436f6c6f723d7768697465"
                                alt="PHP"
                                data-canonical-src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&amp;logo=php&amp;logoColor=white"
                                style="max-width: 100%;"></li>
                        <li><strong>HOSTING/SaaS</strong> — <img
                                src="https://img.shields.io/badge/vercel-%23000000.svg?style=for-the-badge&amp;logo=vercel&amp;logoColor=white"
                                alt="Vercel">.</li>
                        <li><strong>FRAMEWORKS, PLATFORMS & LIBRARIES</strong> — <img
                                src="https://img.shields.io/badge/Socket.io-black?style=for-the-badge&amp;logo=socket.io&amp;badgeColor=010101"
                                alt="Socket.io"><img
                                src="https://img.shields.io/badge/redux-%23593d88.svg?style=for-the-badge&amp;logo=redux&amp;logoColor=white"
                                alt="Redux"><img
                                src="https://img.shields.io/badge/React_Router-CA4245?style=for-the-badge&amp;logo=react-router&amp;logoColor=white"
                                alt="React Router"><img
                                src="https://img.shields.io/badge/react-%2320232a.svg?style=for-the-badge&amp;logo=react&amp;logoColor=%2361DAFB"
                                alt="React"><img
                                src="https://img.shields.io/badge/node.js-6DA55F?style=for-the-badge&amp;logo=node.js&amp;logoColor=white"
                                alt="NodeJS"><img
                                src="https://img.shields.io/badge/NPM-%23000000.svg?style=for-the-badge&amp;logo=npm&amp;logoColor=white"
                                alt="NPM"><img
                                src="https://img.shields.io/badge/MUI-%230081CB.svg?style=for-the-badge&amp;logo=material-ui&amp;logoColor=white"
                                alt="MUI"><img
                                src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&amp;logo=laravel&amp;logoColor=white"
                                alt="Laravel"><img
                                src="https://img.shields.io/badge/JWT-black?style=for-the-badge&amp;logo=JSON%20web%20tokens"
                                alt="JWT"><img
                                src="https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&amp;logo=jquery&amp;logoColor=white"
                                alt="jQuery"><img
                                src="https://img.shields.io/badge/express.js-%23404d59.svg?style=for-the-badge&amp;logo=express&amp;logoColor=%2361DAFB"
                                alt="Express.js"><img
                                src="https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&amp;logo=bootstrap&amp;logoColor=white"
                                alt="Bootstrap">.</li>

                        <li><strong>DATABASES</strong> — <img
                                src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&amp;logo=mysql&amp;logoColor=white"
                                alt="MySQL"><img
                                src="https://img.shields.io/badge/MongoDB-%234ea94b.svg?style=for-the-badge&amp;logo=mongodb&amp;logoColor=white"
                                alt="MongoDB">.</li>
                        <li><strong>DESIGN</strong> — <img
                                src="https://img.shields.io/badge/figma-%23F24E1E.svg?style=for-the-badge&amp;logo=figma&amp;logoColor=white"
                                alt="Figma">.</li>
                        <li><strong>OTHER</strong> — <img
                                src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&amp;logo=postman&amp;logoColor=white"
                                alt="Postman"></li>
                    </ol>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis neque ut purus fermentum, ac
                        pretium nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci non sapien
                        ullamcorper dapibus. Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                        Suspendisse potenti. Pellentesque et molestie ante. In feugiat ante vitae ultricies malesuada.</p>
                    <p>For information about how to contact us, please visit our <a href="#">contact page</a>.</p>
                </div>
            </div>
        </div>
    </div>
@endsection