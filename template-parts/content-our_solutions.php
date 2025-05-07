<main class="main-wrapper">
  <div class="section">
    <div class="container-medium">
      <div class="padding-vertical">
        <div class="inner-container2">
            <div class="our-solution-section">
              <div class="saf_btn border-btn marBottom20"><h5 class="gradient-font"><?php echo esc_html__( 'Our Solutions', 'essar' ); ?></h5></div>
              <h2 class="hero_title"><?php echo esc_html__( 'Sustainable Aviation Fuel (SAF):', 'essar' ); ?></h2>
              <h2 class="hero_title gradient-font"><?php echo esc_html__( 'Decarbonizing Air Travel', 'essar' ); ?></h2>
              <p class="os_paragraph marTop20"><?php echo esc_html__( 'As the aviation industry works toward a net-zero future, Sustainable Aviation Fuel (SAF) is the most effective solution for reducing carbon emissions while maintaining operational efficiency. SAF is a drop-in replacement for conventional jet fuel, requiring no modifications to aircraft or fueling infrastructure, making it the fastest and most scalable way to decarbonize air travel. By using SAF, airlines can cut lifecycle CO₂ emissions by up to 80%, helping them meet sustainability mandates and climate goals.', 'essar' ); ?></p>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="scroll-section vertical-section section">
    <div class="wrapper">
      <div role="list" class="list">
        <div role="listitem" class="item_saf">
          <div class="item_content plane-section">
              <div class="inner-container2">
                <div class="our-production-section">
                  <div class="inner-content-area">
                      <div class="saf_btn gradient-btn marBottom20">
                        <h5 class=""><?php echo esc_html__( 'Production', 'essar' ); ?></h5>
                        </div>
                      <h2 class="hero_title"><?php echo esc_html__( 'Scaling a Cleaner Future for Aviation', 'essar' ); ?></h2>
                      <p class="os_paragraph marTop20"><?php echo esc_html__( 'At Essar Future Energy, we are committed to producing SAF at scale to meet the growing global demand for low-carbon aviation fuels. Our state-of-the-art biofuels complex in India is designed to supply SAF to both domestic and international markets, aligning with global efforts to reduce aviation-related emissions. Our advanced refining capabilities ensure a high-quality, reliable SAF supply that meets international standards.', 'essar' ); ?></p>
                    </div>
                      <?php
                      $plane_img = get_template_directory_uri() . '/images/saf/plane.png';
                      ?>
                      <img src="<?php echo esc_url( $plane_img ); ?>" alt="<?php echo esc_attr__( 'Airplane', 'essar' ); ?>" class="plane-img">
                  </div>
                </div>
              </div>
        </div>

        <div role="listitem" class="item_saf">
          <div class="item_content plant-section">
              <div class="inner-container2">
                  <div class="inner-content-area">
                    <div class="saf_btn gradient-btn marBottom20">
                      <h5 class=""><?php echo esc_html__( 'feedstock', 'essar' ); ?></h5>
                    </div>
                      <h2 class="hero_title"><?php echo esc_html__( 'Sustainable & Scalable', 'essar' ); ?></h2>
                      <p class="os_paragraph marTop20"><?php echo esc_html__( 'Our SAF is produced from sustainably sourced waste-based and renewable feedstocks, ensuring minimal environmental impact and no competition with food production. By utilizing waste oils, fats, and other non-food waste and residue-based feeds compliant with the latest EU RED mandates, we support a circular economy and long-term feedstock security.', 'essar' ); ?></p>
                    </div>
                </div>
              </div>
        </div>
        <div role="listitem" class="item_saf">
          <div class="item_content tech-section">
              <div class="inner-container2">
                  <div class="inner-content-area">
                    <div class="saf_btn gradient-btn marBottom20">
                      <h5 class=""><?php echo esc_html__( 'process', 'essar' ); ?></h5>
                    </div>
                      <h2 class="hero_title FWC"><?php echo esc_html__( 'Proven & Efficient Technology', 'essar' ); ?></h2>
                      <p class="os_paragraph marTop20 FWC">
                        <?php echo esc_html__( 'We produce SAF using world-leading technology, based on the Hydroprocessed Esters and Fatty Acids (HEFA) process, the most widely adopted and commercially scalable method for sustainable aviation fuel production. This process ensures high energy efficiency, reduced emissions, and seamless compatibility with existing jet fuel infrastructure.', 'essar' ); ?></p>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Benefits Section -->
<section class="benefits-section animate-on-scroll">
  <div class="inner-container2">
      <h2 class="heading_title"><?php echo esc_html__( 'Who', 'essar' ); ?> <span class="gradient-font"><?php echo esc_html__( 'Benefits', 'essar' ); ?></span> <?php echo esc_html__( 'from SAF?', 'essar' ); ?></h2>
      <div class="benefits-cards">
        <div class="card">
          <?php
          $blend_img = get_template_directory_uri() . '/images/saf/lucide_blend.png';
          ?>
          <img src="<?php echo esc_url( $blend_img ); ?>" alt="<?php echo esc_attr__( 'Blend Icon', 'essar' ); ?>" />
          <h3><?php echo esc_html__( 'Refiners & Fuel Blenders', 'essar' ); ?></h3>
          <p><?php echo esc_html__( 'Meeting government blending mandates for sustainable aviation fuel adoption', 'essar' ); ?></p>
        </div>
        <div class="card">
          <?php
          $airplane_img = get_template_directory_uri() . '/images/saf/airplane_icon.png';
          ?>
          <img src="<?php echo esc_url( $airplane_img ); ?>" alt="<?php echo esc_attr__( 'Airplane Icon', 'essar' ); ?>" />
          <h3><?php echo esc_html__( 'Airlines & Aviation Industry', 'essar' ); ?></h3>
          <p><?php echo esc_html__( 'Cutting aviation-related GHG emissions and achieving net-zero targets', 'essar' ); ?></p>
        </div>
        <div class="card">
          <?php
          $corp_img = get_template_directory_uri() . '/images/saf/corp_icon.png';
          ?>
          <img src="<?php echo esc_url( $corp_img ); ?>" alt="<?php echo esc_attr__( 'Corporate Icon', 'essar' ); ?>" />
          <h3><?php echo esc_html__( 'Corporates & Logistics', 'essar' ); ?></h3>
          <p><?php echo esc_html__( 'Supporting sustainable business travel and supply chain decarbonization', 'essar' ); ?></p>
        </div>
      </div>                          
  </div>
</section>

<!-- Partnership Section -->
<section class="partnership-section animate-on-scroll">
  <div class="container">
    <div class="call_to_action_section">
        <div class="inner-container2">
          <div class="Left_cta_section">
            <h2 class="cta_title"><?php echo esc_html__( 'Partner with us in building a cleaner aviation future', 'essar' ); ?></h2>
            <p class="os_paragraph"><?php echo esc_html__( 'With growing regulatory pressures and sustainability commitments, SAF is the future of aviation. Essar Future Energy is ready to supply scalable, reliable, and high-performance SAF solutions to power this transformation.', 'essar' ); ?></p>
            <div class="partner-btn"><a href="#" class="contact-bg"><span class="con-txt"><?php echo esc_html__( 'Contact Us', 'essar' ); ?></span> <span class="arrow"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>"></span><span class="arrow2"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/Arrow-3.png' ); ?>" alt="<?php echo esc_attr__( 'Arrow Icon', 'essar' ); ?>"></span></a></div>
          </div>

          <?php
          $partner_img = get_template_directory_uri() . '/images/saf/calltoaction.png';
          ?>
          <img src="<?php echo esc_url( $partner_img ); ?>" alt="<?php echo esc_attr__( 'Plane and Hand', 'essar' ); ?>" class="partner-img">
        </div>
    </div>
  </div>
</section>

<!-- Browse Other Solutions -->
<section class="browse-solutions animate-on-scroll">
  <div class="container">
    <div class="inner-container2">
      <h2 class="browse-title"><?php echo esc_html__( 'Browse', 'essar' ); ?> <span class="gradient-font"><?php echo esc_html__( 'other Solutions', 'essar' ); ?></span></h2>
      <div class="solutions-grid">
        <div class="solution-card">
          <a href="<?php echo esc_url( '#' ); ?>">
            <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/hvo.png' ); ?>" alt="<?php echo esc_attr__( 'HVO Solution', 'essar' ); ?>" /></div>
            <div class="solution_btn_section">
              <span class="solution-txt"><?php echo esc_html__( 'Hydrotreated Vegetable Oil (HVO)', 'essar' ); ?></span>
              <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
            </div>
          </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/green_hydrogen.png' ); ?>" alt="<?php echo esc_attr__( 'Green Hydrogen Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'Green Hydrogen', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/green_ammonia.png' ); ?>" alt="<?php echo esc_attr__( 'Green Ammonia Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'Green Ammonia', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
        <div class="solution-card">
            <a href="<?php echo esc_url( '#' ); ?>">
              <div class="solution_img"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/saf/e_methanol.png' ); ?>" alt="<?php echo esc_attr__( 'E-Methanol Solution', 'essar' ); ?>" /></div>
              <div class="solution_btn_section">
                <span class="solution-txt"><?php echo esc_html__( 'E-Methanol', 'essar' ); ?></span>
                <span><img src="<?php echo esc_url( get_template_directory_uri() . '/images/nr-button.png' ); ?>" alt="<?php echo esc_attr__( 'Navigation Arrow', 'essar' ); ?>" /></span>
              </div>
            </a>
        </div>
      </div>
    </div>
  </div>
</section>