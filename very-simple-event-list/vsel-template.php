<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// start event details
if ( $list_id == 'page' ) {
	// if event details starts after title
	if ( $vsel_title_location == 'yes' ) {
		$output .= $vsel_event_title;
		$output .= $vsel_meta_start;
	// if not
	} else {
		$output .= $vsel_meta_start;
	}
} else {
	$output .= $vsel_meta_start;
}
	// if date icon is displayed next to other event details
	if ( ( $vsel_date_hide != 'yes' ) && ( $vsel_date_type == 'icon' ) && ( $vsel_meta_combine == 'yes' ) ) {
		$output .= '<div class="vsel-meta-combine">';
	// if not
	// display title
	} elseif ( $list_id == 'page' ) {
		if ( $vsel_title_location != 'yes' ) {
			$output .= $vsel_event_title;
		}
	} elseif ( $list_id == 'widget' ) {
		$output .= $vsel_event_title;
	}
	// date
	if ( $vsel_date_hide != 'yes' ) {
		if ( empty( $start_date ) || empty( $end_date ) || ( $start_date > $end_date ) ) {
			$output .= '<div class="vsel-meta-date vsel-meta-error">';
			$output .= esc_html__( 'Error: please reset date.', 'very-simple-event-list' );
			$output .= '</div>';
		} elseif ( $end_date > $start_date ) {
			if ( $vsel_date_type == 'icon' ) {
				if ( ( $vsel_date_format == 'j F Y' ) || ( $vsel_date_format == 'd/m/Y' ) || ( $vsel_date_format == 'd-m-Y' ) ) {
					$output .= '<div class="vsel-meta-date-icon vsel-meta-combined-date-icon"><div class="vsel-start-icon">';
					$output .= $vsel_start_icon_1;
					$output .= '</div>';
					$output .= '<div class="vsel-end-icon">';
					$output .= $vsel_end_icon_1;
					$output .= '</div></div>';
				} else {
					$output .= '<div class="vsel-meta-date-icon vsel-meta-combined-date-icon"><div class="vsel-start-icon">';
					$output .= $vsel_start_icon_2;
					$output .= '</div>';
					$output .= '<div class="vsel-end-icon">';
					$output .= $vsel_end_icon_2;
					$output .= '</div></div>';
				}
			} else {
				if ( $vsel_date_combine == 'yes' ) {
					$output .= '<div class="vsel-meta-date vsel-meta-combined-date">';
					$output .= $vsel_start_default;
					$output .= ' '.esc_html( $date_separator ).' ';
					$output .= $vsel_end_default;
					$output .= '</div>';
				} else {
					$output .= '<div class="vsel-meta-date vsel-meta-start-date">';
					$output .= $vsel_start_default;
					$output .= '</div>';
					$output .= '<div class="vsel-meta-date vsel-meta-end-date">';
					$output .= $vsel_end_default;
					$output .= '</div>';
				}
			}
		} elseif ( $end_date == $start_date ) {
			if ( $vsel_date_type == 'icon' ) {
				if ( ( $vsel_date_format == 'j F Y' ) || ( $vsel_date_format == 'd/m/Y' ) || ( $vsel_date_format == 'd-m-Y' ) ) {
					$output .= '<div class="vsel-meta-date-icon vsel-meta-single-date-icon"><div class="vsel-start-icon">';
					$output .= $vsel_start_icon_1;
					$output .= '</div></div>';
				} else {
					$output .= '<div class="vsel-meta-date-icon vsel-meta-single-date-icon"><div class="vsel-start-icon">';
					$output .= $vsel_start_icon_2;
					$output .= '</div></div>';
				}
			} else {
				$output .= '<div class="vsel-meta-date vsel-meta-single-date">';
				$output .= $vsel_same_default;
				$output .= '</div>';
			}
		}
	}
	// if date icon is displayed next to other event details
	if ( ( $vsel_date_hide != 'yes' ) && ( $vsel_date_type == 'icon' ) && ( $vsel_meta_combine == 'yes' ) ) {
		// display title next to date icons
		if ( $list_id == 'page' ) {
			if ( $vsel_title_location != 'yes' ) {
				$output .= $vsel_event_title;
			}
		} elseif ( $list_id == 'widget' ) {
			$output .= $vsel_event_title;
		}
	}
	// time
	if ( $vsel_time_hide != 'yes' ) {
		if ( $one_time_field != 'yes' ) {
			if ( ( $start_date == $end_date ) && ( $start_time > $end_time ) ) {
				$output .= '<div class="vsel-meta-time vsel-meta-error">';
				$output .= esc_html__( 'Error: please reset time.', 'very-simple-event-list' );
				$output .= '</div>';
			} else {
				if ( $all_day_event == 'yes' ) {
					$output .= '<div class="vsel-meta-time vsel-meta-all-day">';
					$output .= esc_html( $vsel_all_day_label );
					$output .= '</div>';
				} else {
					if ( ( $hide_equal_time == 'yes' ) && ( $start_time == $end_time ) ) {
						$output .= '';
					} else {
						if ( $hide_end_time == 'yes' ) {
							$end = '';
						} else {
							$end = ' '.esc_html( $time_separator ).' '.wp_date( esc_attr( $template_time_format ), esc_attr( $end_date_timestamp ), $utc_timezone );
						}
						$output .= '<div class="vsel-meta-time">';
						$output .= sprintf( esc_html( $vsel_time_label ), '<span>'.wp_date( esc_attr( $template_time_format ), esc_attr( $start_date_timestamp ), $utc_timezone ).$end.'</span>' );
						$output .= '</div>';
					}
				}
			}
		} else {
			if ( ! empty( $one_time ) ) {
				$output .= '<div class="vsel-meta-time">';
				$output .= sprintf( esc_html( $vsel_time_label ), '<span>'.esc_html( $one_time ).'</span>' );
				$output .= '</div>';
			}
		}
	}
	// location
	if ( $vsel_location_hide != 'yes' ) {
		if ( ! empty( $location ) ) {
			$output .= '<div class="vsel-meta-location">';
			$output .= sprintf( esc_html( $vsel_location_label ), '<span>'.esc_html( $location ).'</span>' );
			$output .= '</div>';
		}
	}
	// include acf fields
	if ( class_exists( 'acf' ) && ( empty( $vsel_acf_fields ) || ( $vsel_acf_fields == 'no' ) || ( $vsel_acf_fields == 'details' ) ) ) {
		include 'vsel-acf.php';
	}
	// more info link
	if ( ( $redirect_title_to_more_info != 'yes' ) && ( $redirect_image_to_more_info != 'yes' ) ) {
		if ( $vsel_link_hide != 'yes' ) {
			if ( ! empty( $more_info_link ) ) {
				$output .= '<div class="vsel-meta-link">';
				$output .= '<a href="'.esc_url( $more_info_link ).'" rel="noopener noreferrer" '.$more_info_link_target.' title="'.esc_url( $more_info_link ).'">'.esc_html( $more_info_link_label ).'</a>';
				$output .= '</div>';
			}
		}
	}
	// categories
	if ( $vsel_cats_hide != 'yes' ) {
		$cats_raw = wp_strip_all_tags( get_the_term_list( get_the_ID(), 'event_cat', '<span>', ' '.esc_html( $cat_separator ).' ', '</span>' ) );
		$cats = get_the_term_list( get_the_ID(), 'event_cat', '<span>', ' '.esc_html( $cat_separator ).' ', '</span>' );
		if ( has_term( '', 'event_cat', get_the_ID() ) ) {
			if ( $vsel_link_cat != 'yes' ) {
				$output .= '<div class="vsel-meta-cats">';
				$output .= $cats_raw;
				$output .= '</div>';
			} else {
				$output .= '<div class="vsel-meta-cats">';
				$output .= $cats;
				$output .= '</div>';
			}
		}
	}
	// if date icon is displayed next to other event details
	if ( ( $vsel_date_hide != 'yes' ) && ( $vsel_date_type == 'icon' ) && ( $vsel_meta_combine == 'yes' ) ) {
		$output .= '</div>';
	}
	// end event details
	$output .= $vsel_meta_end;
	// start event info
	if ( ( $list_id == 'page' ) || ( $list_id == 'widget' ) ) {
		if ( ( $vsel_image_hide != 'yes' ) && ( $vsel_info_hide != 'yes' ) ) {
			$output .= $vsel_info_start;
				// featured image
				if ( $vsel_atts['featured_image'] != 'false' ) {
					if ( $vsel_image_hide != 'yes' ) {
						if ( has_post_thumbnail() ) {
							$image_alt = get_post_meta( get_post_thumbnail_id( get_the_ID() ), '_wp_attachment_image_alt', true );
							$image_title = get_the_title( get_post_thumbnail_id( get_the_ID() ) );
							if ( ! empty( $image_alt ) ) {
								$image_alt = $image_alt;
							} else {
								$image_alt = $image_title;
							}
							$caption = get_the_post_thumbnail_caption( get_the_ID() );
							if ( ! empty( $caption ) && ( $vsel_atts['featured_image_caption'] != 'false' ) ) {
								$image_caption = '<figcaption class="vsel-caption">'.$caption.'</figcaption>';
							} else {
								$image_caption = '';
							}
							if ( $vsel_atts['featured_image_link'] == 'false' ) {
								$output .= '<figure class="vsel-image-figure '.$vsel_img_class.'" style="'.$vsel_image_max_width.'">'.get_the_post_thumbnail( get_the_ID(), $vsel_image_source, array( 'class' => 'vsel-image-img', 'alt' => $image_alt ) ).$image_caption.'</figure>';
							} else {
								if ( ( $redirect_image_to_more_info == 'yes' ) && ! empty( $more_info_link ) ) {
									$output .= '<figure class="vsel-image '.$vsel_img_class.'" style="'.$vsel_image_max_width.'"><a href="'.esc_url( $more_info_link ).'" rel="noopener noreferrer" '.$more_info_link_target.'>'.get_the_post_thumbnail( get_the_ID(), $vsel_image_source, array( 'class' => 'vsel-image-img', 'alt' => $image_alt ) ).$image_caption.'</a></figure>';
								} elseif ( $vsel_link_image == 'yes' ) {
									$output .= '<figure class="vsel-image '.$vsel_img_class.'" style="'.$vsel_image_max_width.'"><a href="'.get_permalink().'" rel="bookmark">'.get_the_post_thumbnail( get_the_ID(), $vsel_image_source, array( 'class' => 'vsel-image-img', 'alt' => $image_alt ) ).$image_caption.'</a></figure>';
								} else {
									$output .= '<figure class="vsel-image '.$vsel_img_class.'" style="'.$vsel_image_max_width.'">'.get_the_post_thumbnail( get_the_ID(), $vsel_image_source, array( 'class' => 'vsel-image-img', 'alt' => $image_alt ) ).$image_caption.'</figure>';
								}
							}
						}
					}
				}
		}
	} else {
		$output .= $vsel_info_start;
	}
	// event text
	if ( $list_id == 'template_support_single' ) {
		$output .= '<div class="vsel-text">';
			$output .= $content;
		$output .= '</div>';
	} else {
		if ( $vsel_info_hide != 'yes' ) {
			$output .= '<div class="vsel-text">';
			if ( ( $list_id == 'page' ) || ( $list_id == 'widget' ) ) {
				if ( $vsel_atts['event_info'] == 'summary' ) {
					if ( ! empty( $summary ) ) {
						$output .= apply_filters( 'the_excerpt', $summary );
					} else {
						$output .= apply_filters( 'the_excerpt', get_the_excerpt() );
					}
				} elseif ( $vsel_atts['event_info'] == 'all' ) {
					$output .= apply_filters( 'the_content', get_the_content() );
				} else {
					if ( $vsel_event_info == 'summary' ) {
						if ( ! empty( $summary ) ) {
							$output .= apply_filters( 'the_excerpt', $summary );
						} else {
							$output .= apply_filters( 'the_excerpt', get_the_excerpt() );
						}
					} else {
						$output .= apply_filters( 'the_content', get_the_content() );
					}
				}
				if ( $vsel_atts['read_more'] != 'false' ) {
					if ( $vsel_read_more == 'yes' ) {
						$output .= '<a class="vsel-read-more" href="'.get_permalink().'" rel="bookmark">'.esc_html( $vsel_read_more_label ).'</a>';
					}
				}
			} elseif ( $list_id == 'template_support_content' ) {
				$output .= $vsel_event_content;
			} elseif ( $list_id == 'template_support_excerpt' ) {
				$output .= $vsel_event_summary;
			}
			$output .= '</div>';
		}
	}
	// include acf fields
	if ( class_exists( 'acf' ) && ( $vsel_acf_fields == 'info' ) ) {
		$acf_fields = get_fields();
		$has_acf_fields = false;
		if ( $acf_fields ) {
			foreach( $acf_fields as $acf_field => $acf_field_value ) {
				if ( ! empty( $acf_field_value ) ) {
					$has_acf_fields = true;
				}
			}
			if ( $has_acf_fields == true ) {
				$output .= '<div class="vsel-info-acf-fields">';
					include 'vsel-acf.php';
				$output .= '</div>';
			}
		}
	}
	// end event info
	if ( ( $list_id == 'page' ) || ( $list_id == 'widget' ) ) {
		if ( ( $vsel_image_hide != 'yes' ) && ( $vsel_info_hide != 'yes' ) ) {
			$output .= $vsel_info_end;
		}
	} else {
		$output .= $vsel_info_end;
	}
