const errorHandler = (text = 'エラーが発生しました。再度お試しください。') => {
    Swal.fire({
        html: text,
        icon: 'error',
        confirmButtonText: 'OK',
    });
};

