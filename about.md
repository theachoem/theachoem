---
layout: about
title: About
permalink: /about/
profile: https://avatars.githubusercontent.com/u/29684683?v=4
skills:
- Flutter
- Figma
- Ruby on Rails
- Node JS
- Typescript
- Javascript
- Python
- Jekyll
- HTML
- SCSS
- PostgreSQL
quote: The only way to learn a new programming language is by writing programs in it - Dennis Ritchie
summary: A passionate developer that enjoys learning and experimenting new things. With 3 years+ of experience working with software development & interface design, it gives me a capable foundation in solving problems, learning a new programming language, and turning ideas into scalable applications.
---
{% include dot.md %}
<h2 class="post-list-heading">Listen to your music 🎸</h2>

<div class="splide video-gallery">
  <div class="splide__track">
    <ul class="splide__list">
      <li class="splide__slide no-padding">
        <iframe src="https://www.facebook.com/plugins/video.php?height=322&href=https%3A%2F%2Fweb.facebook.com%2Ftheacheng.
  g6%2Fvideos%2F447226289555248%2F&show_text=false&width=560&t=0" scrolling="no" frameborder="0" allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
          allowFullScreen="true"></iframe>
      </li>
      <li class="splide__slide no-padding">
        <iframe
          src="https://www.facebook.com/plugins/video.php?height=323&href=https%3A%2F%2Fweb.facebook.com%2Ftheacheng.g6%2Fvideos%2F352314369046441%2F&show_text=false&width=560&t=0"
          style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
          allowFullScreen="true"></iframe>
      </li>
      <li class="splide__slide no-padding scale-up">
       <iframe width="560" height="315" src="https://www.youtube.com/embed/rmIQ5BegN8A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </li>
    </ul>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
  function testimonialSetup() {
    const primarySlider = new Splide('.splide', {
      type: 'fade',
      pagination: false,
      arrows: true,
      cover: true,
      drag: false,
    });
    document.addEventListener('DOMContentLoaded', function () {
      primarySlider.mount();
    });
  }
  testimonialSetup();
</script>
