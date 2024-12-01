function diffDate(startDate, endDate) {
    const date1 = new Date(startDate);
    const date2 = new Date(endDate);
    const diffInMilliseconds = date1 - date2;
    // Konversi ke hari
    const diffInDays = diffInMilliseconds / (1000 * 60 * 60 * 24);
    return diffInDays;
}

function logout() {
    $.ajax({
        url: "auth/logout",
        method: "DELETE",
        success: function (response) {
            console.log("Logout berhasil:", response);
            // Contoh: Redirect ke halaman login setelah logout
            window.location.href = "/login";
        },
        error: function (error) {
            console.error("Logout gagal:", error);
        },
    });
}
