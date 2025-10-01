<h1 align="center">🎞️Phân tích và Thiết kế hệ thống quản lý rạp chiếu phim </h1>

<p align="center">
  <img src="https://img.shields.io/badge/HTML-5-orange" />
  <img src="https://img.shields.io/badge/CSS-3-blue" />
  <img src="https://img.shields.io/badge/Bootstrap-5-purple" />
  <img src="https://img.shields.io/badge/PHP-8.2-indigo" />
  <img src="https://img.shields.io/badge/Laravel-10-red" />
  <img src="https://img.shields.io/badge/Database-MySQL-yellow" />
</p>

<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/34/34627.png" width="100" />
</p>

<p align="center"><strong>Hệ thống đặt quản lý rạp chiếu phim hiện đại – chính xác – tiện lợi</strong></p>

## 📘 Giới thiệu  

Hệ thống **Quản lý Rạp Chiếu Phim** được phát triển trên nền tảng **PHP Laravel**, với giao diện người dùng xây dựng bằng **HTML, CSS và Bootstrap**. Cơ sở dữ liệu sử dụng **MySQL**, thiết kế theo mô hình **MVC 3 lớp**, đảm bảo tính tổ chức, khả năng mở rộng và dễ dàng bảo trì trong quá trình phát triển.  

### 🔑 Ứng dụng cung cấp hai phân hệ chính  

#### 👤 Người dùng (User/Khách hàng)  
- Tra cứu và theo dõi danh sách phim đang chiếu hoặc sắp chiếu.  
- Xem chi tiết thông tin phim, lịch chiếu và phòng chiếu.  
- Đặt vé trực tuyến, lựa chọn ghế ngồi, thanh toán và quản lý lịch sử giao dịch.  
- Tích lũy điểm thành viên, hỗ trợ các chương trình khuyến mãi và ưu đãi.  

#### 🛠️ Quản trị hệ thống (Admin/Nhân viên)  
- Quản lý thông tin khách hàng, nhân viên và tài khoản hệ thống.  
- Quản lý danh mục phim, suất chiếu, phòng chiếu và sơ đồ ghế.  
- Theo dõi và xử lý hóa đơn, vé, doanh thu theo ngày/tháng/năm.  
- Hỗ trợ phân quyền (**Admin, Quản lý, Thu ngân, Bán vé**) nhằm đảm bảo bảo mật và hiệu quả vận hành.  
- Cung cấp thống kê và báo cáo phục vụ công tác quản lý, phân tích và ra quyết định.
### Chức năng nổi bật : Hệ thống sẽ tự động thông báo vé có thời gian sắp chiếu tới khách hàng.

### 🎯 Đối tượng sử dụng  
- Các cụm rạp chiếu phim vừa và nhỏ.  
- Doanh nghiệp hoặc phòng vé cần hệ thống quản lý tập trung.  
- Các cơ sở đào tạo, sinh viên CNTT trong việc nghiên cứu và thực hành xây dựng hệ thống phần mềm quản lý.  
### 🎯 Mục tiêu dự án  
- Xây dựng một hệ thống quản lý rạp chiếu phim trực tuyến hiệu quả, minh bạch và dễ sử dụng.  
- Tối ưu hóa quy trình đặt vé và quản lý suất chiếu, giúp giảm thiểu sai sót trong khâu vận hành.  
- Hỗ trợ phân quyền rõ ràng giữa người dùng và quản trị viên, đảm bảo an toàn và bảo mật dữ liệu.  
- Cung cấp công cụ báo cáo, thống kê doanh thu và hiệu suất để phục vụ cho việc phân tích và ra quyết định quản lý.  
- Hướng tới khả năng triển khai thực tế cho các rạp chiếu phim vừa và nhỏ, cũng như phục vụ nhu cầu học tập, nghiên cứu.

### ⚙️ Chức năng chính
## 🖥️Giao diện Admin 




























<h1>Hệ thống quản lý rạp chiếu phim </h1> 
<h2>Giới Thiệu Dự Án </h2>
Dự án này nhằm xây dựng một ứng dụng quản lý rạp chiếu phim, giúp tối ưu hóa quy trình vận hành và đặt vé thông qua việc sử dụng ngôn ngữ Java và thư viện Java SpringBoot. Ứng dụng cung cấp các chức năng thiết yếu như quản lý phim, lịch chiếu, phòng chiếu, đặt vé và khách hàng, hóa đơn , ghế ngồi  từ đó tạo ra một hệ thống trực quan, hiệu quả và dễ sử dụng cho cả nhân viên và người dùng.
<h2>Mục Tiêu </h2>


1. Giao diện

    - Giao diện đồ họa bằng HTML + CSS + Thymleaf + Lavareal + PHP 
      
2. Chức năng chính
   + Quản lý Phim : <br>
     Thêm phim mới ( tên , thể loại , ngày công chiếu , mô tả , ... ) <br>
     Cập nhập thông tin phim <br>
     Xóa Phim<br>
     Liệt kê phim<br>
   + Quản lý Phòng Chiếu <br>
       Thêm mới , sửa , xóa phòng chiếu và danh sách ghế .<br>
   + Quản lý Suất  Chiếu <br>
       Quản lý lịch chiếu cho từng phim theo thời gian và phòng<br>
       Thêm suất: Chọn phim, phòng, thời gian<br>
       Cập nhật: sửa thời gian, phòng<br>
   + Quản lý Vé :  Xem trạng thái ghế đã đặt theo suất chiếu, cập nhật/trả vé. <br>
       Tạo hóa đơn khi đặt vé gồm ngày giờ thanh toán , tổng tiền , ...<br>
       Truy vấn danh sách Ve theo SuatChieu<br>
       Hiển thị trạng thái:  paid, pending<br>
       Cập nhật trạng thái vé (nếu có yêu cầu hủy/trả)<br>
   + Quản lý Hóa Đơn  :Xem thông tin hóa đơn đã thanh toán<br>
       Mối hóa đơn có dánh sách vé <br>
         
   + Quản lý Người Dùng : Đối tượng sử dụng
       Khách hàng : Đăng ký , đặt vé , xem lịch chiếu .<br>
       Nhân viên : Tạo Phim , Suất  Chiếu , Phòng chiếu <br>
   
<h2> Thành Viên Nhóm </h2>

<h2> Sơ đồ khối </h2>

<h3>UML Class Diagram</h3>


![Sơ đồ class ](https://github.com/ngduktrong/Group15_OOP_NO2_term3_2025/blob/main/img/image.png)
<h3>UML Squence Diagram </h3>
![Sơ đồ squence](https://github.com/ngduktrong/Group15_OOP_NO2_term3_2025/blob/main/img/Screenshot%202025-05-20%20120942.png?raw=true)
<h3> UML Chức năng Đăng nhập </h3>
![Sơ đồ login](https://github.com/ngduktrong/Group15_OOP_NO2_term3_2025/blob/main/img/ChucNanglogin.png?raw=true)
<h3> UML Chúc năng Quản lý phim : Xem và Thêm </h3>
![Sơ đồ view and create](https://github.com/ngduktrong/Group15_OOP_NO2_term3_2025/blob/main/img/Th%C3%AAm%20and%20Xem.png?raw=true)
<h3>UML Chức năng quản lý phim : Xóa và Sửa </h3>
![Sơ  đồ set and delete ](https://github.com/ngduktrong/Group15_OOP_NO2_term3_2025/blob/main/img/X%C3%B3a%20and%20s%E1%BB%ADa.png?raw=true)

<h3>Chuc năng chính : Thông báo vé đến giờ chiều của khách hàng </h3>





