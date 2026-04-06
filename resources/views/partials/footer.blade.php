<footer class="footer text-center py-3 mt-4">
    <div class="container">
        <small>
            &copy; {{ date('Y') }} Product Management System. | All rights reserved.
        </small>
    </div>
</footer>

<style>
    .footer {
        background: linear-gradient(135deg,#ff4fa3,#8b5cf6,#3da5ff);
        color: white;
        border-radius: 12px;
        box-shadow: 0 -5px 20px rgba(0,0,0,0.1);
    }

    .footer small {
        font-weight:500;
        letter-spacing:0.5px;
    }

    /* Optional hover effect for links inside footer */
    .footer a {
        color: #fff;
        text-decoration: underline;
        transition: all 0.3s ease;
    }

    .footer a:hover {
        color: #ffd6f0;
    }
</style>