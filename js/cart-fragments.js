(function() {
	function syncCartLinks(count) {
		document.querySelectorAll('[data-cart-link]').forEach(function(link) {
			if (count > 0) {
				link.classList.remove('hidden');
			} else {
				link.classList.add('hidden');
			}
		});
	}

	function updateCartCount(count) {
		var badges = document.querySelectorAll('[data-cart-count]');
		badges.forEach(function(b) {
			if (count > 0) {
				b.textContent = count;
				b.classList.remove('hidden');
			} else {
				b.textContent = '0';
				b.classList.add('hidden');
			}
		});
		syncCartLinks(count);
	}

	function refreshFromFragments(fragments) {
		if (!fragments) return;
		var badgeHtml = fragments['belsks_cart_count'];
		if (typeof badgeHtml !== 'undefined') {
			var tmp = document.createElement('div');
			tmp.innerHTML = badgeHtml;
			var fresh = tmp.firstElementChild;
			var count = fresh ? parseInt(fresh.textContent, 10) : 0;
			document.querySelectorAll('[data-cart-count]').forEach(function(old) {
				if (fresh) {
					old.replaceWith(fresh.cloneNode(true));
				} else {
					old.classList.add('hidden');
					old.textContent = '0';
				}
			});
			syncCartLinks(count);
		}
	}

	// WC fires "added_to_cart" after a successful AJAX add
	document.body.addEventListener('added_to_cart', function(e, fragments, hash) {
		// Prefer fresh fragments from WC if available
		if (fragments && typeof fragments === 'object' && (fragments['belsks_cart_count'] !== undefined || fragments['cart_hash'] !== undefined)) {
			refreshFromFragments(fragments);
			return;
		}
		// Fallback: fetch the badge HTML from the server
		fetch(window.location.href, { credentials: 'same-origin', headers: { 'X-BelSKS-Cart': '1' } })
			.then(function(r) { return r.text(); })
			.then(function(html) {
				var match = html.match(/<span[^>]*data-cart-count[^>]*>(\d+)<\/span>/);
				if (match) { updateCartCount(parseInt(match[1], 10)); }
			})
			.catch(function() {});
	});

	// WC fires "wc_fragments_refreshed" after fragment refresh
	document.body.addEventListener('wc_fragments_refreshed', function() {
		// Re-init lucide icons in case new ones were injected
		if (window.lucide && typeof window.lucide.createIcons === 'function') {
			window.lucide.createIcons();
		}
	});
})();
