<script type="application/ld+json">
{
  "@@context": "https://schema.org/",
  "@@type": "Product",
  "name": "{{ $product->name }}",
  "image": "{{ $product->featured_image_url }}",
  "description": "{{ $product->short_description }}",
  "sku": "{{ $product->sku }}",
  "offers": {
    "@@type": "Offer",
    "url": "{{ request()->url() }}",
    "priceCurrency": "INR",
    "price": "{{ $product->active_price }}",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "{{ $product->in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}"
  }
}
</script>
