<script>
document.querySelector('a[href="#popular-services"]').addEventListener('click', function(e) {
    e.preventDefault();
    const section = document.getElementById('popular-services');
    const yOffset = -70; // navbar height
    const y = section.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({ top: y, behavior: 'smooth' });
});
</script>
