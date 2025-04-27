// Lấy phần tử canvas để vẽ biểu đồ
const ctx = document.getElementById('salesChart').getContext('2d');

// Dữ liệu cho 12 tháng
const labels = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

const doanhThuData = [120, 190, 300, 500, 250, 400, 450, 700, 600, 800, 750, 900];
const luongKhachData = [50, 80, 150, 200, 180, 220, 300, 400, 350, 420, 390, 500];

const salesChart = new Chart(ctx, {
    type: 'bar', // Biểu đồ cột
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Doanh thu (nghìn VNĐ)',
                data: doanhThuData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)', // Màu xanh dương
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Lượng khách đặt hàng',
                data: luongKhachData,
                backgroundColor: 'rgba(255, 99, 132, 0.6)', // Màu đỏ
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    },
    // options: {
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     scales: {
    //         y: {
    //             beginAtZero: true
    //         }
    //     }
    // }
});

