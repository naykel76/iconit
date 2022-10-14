<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/iconit"><img src="https://img.shields.io/packagist/dt/naykel/iconit" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/naykel/iconit"><img src="https://img.shields.io/packagist/v/naykel/iconit" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/naykel/iconit"><img src="https://img.shields.io/packagist/l/naykel/iconit" alt="License"></a>

# Iconit


https://naykel.site/docs/iconit/introduction


This is a guide only and may not work perfectly!

## Adding New Icons

**For consistency:**

- icons should be saved 20 high
- icons should not have any fill color

##### Step 1. Save SVG files in `resources/views/components`.

##### Step 2. change extension from `svg` to `blade.php`

You can batch update the file extensions by running the following command in the `resources/views/components` directory.

```bash
for i in *.svg; do mv -- "$i" "${i%.svg}.blade.php"; done
```

##### Step 3. Remove fill color

Using the editor find and replace, remove the fill colour to allow default styles to work.


##### Step 4. Add $attributes

Search for

    <svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg"

Replace with

    <svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg"
