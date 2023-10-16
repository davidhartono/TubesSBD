-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2023 at 07:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `author_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 'Gordon Ramsay is here!', 'Dear Community Members,\r\n\r\nWe are thrilled to invite you to a one-of-a-kind culinary event that will leave your taste buds tantalized and your cooking skills elevated to new heights. Join us for a remarkable community meetup featuring none other than the legendary Gordon Ramsay as our esteemed guest. As a world-renowned chef, restaurateur, and television personality, Chef Ramsay will grace us with his presence and share his unparalleled cooking experience and skills. Prepare to be inspired as he takes us on a journey through the art of culinary excellence, revealing his secrets, techniques, and passion for creating unforgettable dishes. This is an extraordinary opportunity to learn from a true master, so mark your calendars at 10th of June and get ready to immerse yourself in a culinary adventure like no other. Together, let\'s explore the realms of gastronomy with the one and only Gordon Ramsay.\r\n\r\nWarm regards,\r\nCookpad Admin', '2023-06-02 05:14:48', '2023-06-02 05:14:48'),
(3, 1, 'Testing Activity', 'Testing Activity', '2023-06-08 06:17:04', '2023-06-08 06:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `image`, `title`, `author_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '230602100158.png', 'Shallot', 1, 'Shallots are a type of onion with reddish-brown skin and white flesh. They have a sweet and slightly spicy flavor. Shallots are commonly used as a seasoning in various dishes, either finely chopped or sautéed.', '2023-06-02 03:01:58', '2023-06-02 03:01:58'),
(2, '230602100406.png', 'Garlic', 1, 'Garlic is a bulbous plant with white skin and white flesh. It has a strong and slightly spicy taste. Garlic is often used as a seasoning in various dishes, such as stir-fries, sauces, or marinades.', '2023-06-02 03:04:06', '2023-06-02 03:04:06'),
(3, '230602100422.png', 'Red Chili Pepper', 1, 'Red chili peppers are bright red in color. They can vary in spiciness, depending on the type. Red chili peppers are commonly used to add spiciness and attractive red color to dishes.', '2023-06-02 03:04:22', '2023-06-02 03:04:22'),
(4, '230602100650.png', 'Green Chili Pepper', 1, 'Green chili peppers are green in color. Similar to red chili peppers, their spiciness can vary depending on the type. Green chili peppers are often used in Asian dishes, such as stir-fries, soups, or pickles.', '2023-06-02 03:06:50', '2023-06-02 03:06:50'),
(5, '230602100706.png', 'Ginger', 1, 'Ginger is a root with a spicy and distinctive aroma. It is used in many dishes, especially in Asian cuisine, as a seasoning or flavoring agent. Ginger is often thinly sliced or used in the form of finely grated.', '2023-06-02 03:07:06', '2023-06-02 03:07:06'),
(6, '230602100723.png', 'Lemongrass', 1, 'Lemongrass, also known as sereh or lemon grass, is a type of grass with a fresh and lemony aroma. The inner part of the lemongrass stalk is commonly used as a seasoning in Asian dishes, especially in Thai and Indonesian cuisines. Lemongrass can be thinly sliced or crushed before use.', '2023-06-02 03:07:23', '2023-06-02 03:07:23'),
(7, '230602100736.png', 'Kaffir Lime Leaves', 1, 'Kaffir lime leaves have a unique and aromatic scent. They are often used as a seasoning in Southeast Asian dishes. Kaffir lime leaves are commonly used whole or thinly sliced to provide a fresh and citrusy aroma to dishes, particularly in Indonesian and Thai cuisines.', '2023-06-02 03:07:36', '2023-06-02 03:07:36'),
(8, '230602100750.png', 'Carrot', 1, 'Carrot is an orange-colored root vegetable with a sweet and crunchy taste. Carrots are commonly used in vegetable dishes, stir-fries, soups, or salads. Apart from providing good flavor and texture, carrots are rich in vitamin A and fiber.', '2023-06-02 03:07:51', '2023-06-02 03:07:51'),
(9, '230602100812.jpg', 'Spinach', 1, 'Spinach is a leafy green vegetable with wide, dark leaves. It is often used in dishes such as vegetable stir-fries, soups, sautés, or salads. It has a tender texture and is packed with nutrients.', '2023-06-02 03:08:12', '2023-06-02 03:08:12'),
(10, '230602100833.jpg', 'Corn', 1, 'Corn is a grain vegetable commonly used in dishes like soups, salads, stir-fries, or roasted dishes. It has a sweet taste and a chewy texture. Corn kernels are usually separated from the cob and can be used either fresh or after being boiled.', '2023-06-02 03:08:33', '2023-06-02 03:08:33'),
(11, '230602100928.png', 'Tomato', 1, 'Tomato is a fruit often used as an ingredient in dishes like sauces, soups, stir-fries, or salads. Tomatoes have a fresh and tangy flavor. There are various types of tomatoes, including red tomatoes, cherry tomatoes, or green tomatoes.', '2023-06-02 03:09:28', '2023-06-02 03:09:28'),
(12, '230602100955.png', 'Potato', 1, 'Potato is a tuber commonly used in various dishes such as stir-fries, soups, curries, or roasted dishes. Potatoes have a soft texture and a neutral taste, making them a versatile ingredient in a wide range of dishes.', '2023-06-02 03:09:55', '2023-06-02 03:09:55'),
(13, '230602101026.png', 'Broccoli', 1, 'Broccoli is a green-colored vegetable consisting of tight clusters of florets and a thick stalk. It is often used in stir-fries, soups, salads, or steamed dishes. It has a crunchy texture and is highly nutritious, containing vitamins C, K, and fiber.', '2023-06-02 03:10:26', '2023-06-02 03:10:26'),
(14, '230602101051.png', 'Cabbage', 1, 'Cabbage is a leafy vegetable commonly used in dishes like stir-fries, soups, salads, or pickles. It has a crisp texture and a fresh taste. There are several types of cabbage, such as green cabbage, red cabbage, and white cabbage.', '2023-06-02 03:10:51', '2023-06-02 03:10:51'),
(15, '230602101130.png', 'Chicken', 1, 'Chicken is one of the most commonly used animal ingredients in cooking. Chicken meat has a tender texture and is easy to cook. It is usually used in various dishes such as stir-fries, soups, roasts, or fried dishes.', '2023-06-02 03:11:30', '2023-06-02 03:11:30'),
(16, '230602101152.png', 'Beef', 1, 'Beef is a popular animal ingredient in meat dishes. Beef comes in various cuts such as steak, fillet, minced, or ribs. It has a savory taste and is commonly used in grilled dishes, stir-fries, stews, or soups.', '2023-06-02 03:11:52', '2023-06-02 03:11:52'),
(17, '230602101219.png', 'Pork', 1, 'Pork has a tender and fatty texture, giving a distinctive flavor to dishes. Pork is used in dishes such as stir-fries, roasts, satay, or soups. There are various cuts of pork that can be used, such as pork leg, pork belly, or pork tenderloin.', '2023-06-02 03:12:19', '2023-06-02 03:12:19'),
(18, '230602101235.jpg', 'Egg', 1, 'Egg is a versatile animal ingredient and is often used in cooking. Eggs can be used in dishes such as scrambled eggs, sunny-side-up eggs, omelets, boiled eggs, or salted eggs. Eggs are also used as binders in dough or as a glaze on the surface of bread or pastries.', '2023-06-02 03:12:35', '2023-06-02 03:12:35'),
(19, '230602101305.png', 'Milk', 1, 'Milk is an animal ingredient commonly used in making sauces, soups, or desserts. Milk is also used in dough for bread, cakes, or pancakes to provide softness and richness in texture.', '2023-06-02 03:13:05', '2023-06-02 03:13:05'),
(20, '230602101340.png', 'Salmon', 1, 'Salmon is a popular type of seafood with orange-red flesh that is rich in healthy fats like omega-3. It has a tender texture and a rich flavor. Salmon is often used in dishes such as grilling, baking, stir-fries, sushi, or salads.', '2023-06-02 03:13:40', '2023-06-02 03:13:40'),
(21, '230602101406.png', 'Tuna', 1, 'Tuna is a sea fish with red flesh that is rich in protein. Tuna has a firm texture and a distinctive taste. It is often used in dishes such as sushi, sashimi, grilling, baking, or stir-fries.', '2023-06-02 03:14:06', '2023-06-02 03:14:06'),
(22, '230602101453.png', 'Shrimp', 1, 'Shrimp is a popular seafood and is used in various dishes. Shrimp has sweet flesh and a chewy texture. It is commonly used in dishes such as stir-fries, soups, fried noodles, or grilled dishes.', '2023-06-02 03:14:53', '2023-06-02 03:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_13_012140_create_recipes_table', 1),
(4, '2023_05_19_052259_create_tips_table', 1),
(5, '2023_05_19_071632_create_ingredient_table', 1),
(6, '2023_05_26_131849_create_challenges_table', 1),
(7, '2023_05_26_161134_create_comments_recipe_table', 1),
(8, '2023_05_26_162012_create_comments_tips_table', 1),
(9, '2023_06_01_121325_create_activity_table', 1),
(10, '2023_06_07_124903_add_soft_deletes_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipecomments`
--

CREATE TABLE `recipecomments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `recipe_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipecomments`
--

INSERT INTO `recipecomments` (`id`, `user_id`, `recipe_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Thank you for the recipe!', '2023-06-02 03:58:19', '2023-06-02 03:58:19'),
(2, 4, 2, 'Made this recipe, it\'s awesome. Thanks!', '2023-06-02 04:08:01', '2023-06-02 04:08:01'),
(3, 6, 3, 'LOVE THIS RECIPE!', '2023-06-02 04:23:49', '2023-06-02 04:23:49'),
(4, 6, 1, 'Nice recipe', '2023-06-02 04:34:42', '2023-06-02 04:34:42'),
(7, 7, 1, 'Thank you David!', '2023-06-02 04:38:18', '2023-06-02 04:38:18'),
(8, 5, 6, 'Indomie will always be number 1', '2023-06-02 04:52:31', '2023-06-02 04:52:31'),
(9, 5, 9, 'Added this in my recipe book, thanks!', '2023-06-02 04:52:58', '2023-06-02 04:52:58'),
(10, 5, 2, 'Wow', '2023-06-02 04:58:10', '2023-06-02 04:58:10'),
(11, 8, 9, 'Nice recipe', '2023-06-02 07:21:19', '2023-06-02 07:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `portion` int DEFAULT NULL,
  `time` int DEFAULT NULL,
  `ingredient` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `step` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `author_id`, `image`, `title`, `description`, `portion`, `time`, `ingredient`, `step`, `created_at`, `updated_at`) VALUES
(1, 3, '230608120717.png', 'Jamaican Baked Chicken', 'I tend to season Chicken with Soy Sauce. The other day, I wanted to try a totally new flavour. Since my husband travelled to Barbados, a Caribbean island, I have been interested in Caribbean cuisine. Then I discovered a Chicken dish called ‘Jamaican Jerk Chicken’. I read about it and created my own recipe that I can cook with easily available ingredients. I don’t have BBQ, so I baked them in the oven. The smell of the Baked Chicken was something I had never smelled before. It’s a mix of Chicken, Lime, Vinegar, Garlic and Spices. Are you interested? Why don’t you try it?', 6, 60, '1.5 kg Chicken cut into pieces *I used Drumsticks today\r\nMarinade\r\n3-4 Spring Onions *OR 1 Onion, chopped\r\n3-4 cloves Garlic *chopped\r\n1 thumb-size piece Ginger *chopped\r\n1-2 Hot chillies *I used Jalapeño, you may wish to use hotter chilli, chopped\r\n1/4 cup Oil\r\n1/4 cup Vinegar *I used Apple Cider Vinegar\r\nJuice of 1 Lime\r\n3 tablespoons Brown Sugar *alter the amount to suit your taste\r\n2 teaspoons Salt\r\n1 tablespoonful fresh Thyme Leaves *OR 1 teaspoon if dried\r\n1 teaspoon Ground All Spice\r\n1 teaspoon Ground Pepper\r\n1/2 teaspoon Ground Cinnamon *Five Spice can be used', '1.Step 1\r\nBlend all the Marinade ingredients until smooth. I used stick blender\r\n\r\n2.Step 2\r\nMarinate Chicken pieces in the Marinade, keep in the fridge overnight OR 5-6 hours at least. Leave them at room temperature for 20-30 minutes before you bake them.\r\n\r\n3.Step 3\r\nPreheat oven to 180℃. Line a baking tray with baking paper. *Note: If you use boneless fillets, oven can be hotter.\r\n\r\n4.Step 4\r\nDrain Chicken pieces well, place on the prepared tray, brush some Marinade on top, and bake for 50 minutes OR until nicely browned. *Note: Baking time is shorter if oven is hotter.\r\n\r\n5.Step 5\r\nPlace remaining Marinade into a small saucepan, bring to the boil, and cook until it thickens. This will be the sauce.\r\n\r\n6.Step 6\r\nServe the Baked Chicken with the Sauce. I added some Lime wedges. I recommend to enjoy this Baked Chicken with Rice and refreshing salad.', '2023-06-02 03:21:59', '2023-06-08 05:07:18'),
(2, 3, '230608120734.png', 'Chicken Korma Wrap', 'The idea that eating kebab as part of a dietary regime may sound odd, but this is lean protein and salad essentially.', 2, 20, '1 good wrap of choice\r\nsliced chicken breast\r\nMixed salad of choice\r\ncoconut milk\r\n3 spoons curry paste of choice\r\nslice Lime', '1.Step 1\r\nFirst sweat down some onion and garlic, then cook the chicken on medium heat to keep it soft, then a very high temperature in the last minute to get a slight char developed on the edges.\r\n2.Step 2\r\nWarm the wrap gently before use in a panini press or a dry frying pan to make it supple.\r\n3.Step 3\r\nAdd extra salad you can shape the bread into a tight cone. This makes it easier to eat, and helps prevent the yogurt and chilli sauce dripping from one end.', '2023-06-02 03:52:08', '2023-06-08 05:07:34'),
(3, 4, '230602105532.png', 'Saudi Chicken Kabsa', 'This is a traditional recipe my Saudi family enjoy. I hope you will enjoy it to!', 5, 50, '1.1 Whole Chicken Cut up\r\n2.1/2 Stick Butter\r\n3.1 Cut up Purple Onion\r\n4.1 Cut up Tomato\r\n5.1 Spoon Kabsa Seasoning or Mixed Spices\r\n6.1 Spoon Black Lemon Powder\r\n7.1 Spoon Salt\r\n8.1 Spoon and a half of tomato paste', '1.Step 1\r\nIn a slow cooker, cook onion with butter till soft.\r\n2.Step 2\r\nAdd Chicken and cook some, add Spices, Tomato paste, and tomato. Add 3 water bottles. Pressure cook for 20 minutes.\r\n3.Step 3\r\nRemove the chicken from the pressure cooker and put it in the oven for 20-30 minutes 350 Fahrenheit. In the pressure cooker add 2 cups of soaked basmati rice. Pressure cook on rice option for 12 minutes.', '2023-06-02 03:55:32', '2023-06-02 03:55:56'),
(4, 4, '230602105650.png', 'Braised Chicken', 'I get this recipe from my grandma, hope you guys enjoy it!', 2, 80, '1.2 chicken thign\r\n2.Half red pepper\r\n3.Some black pepper\r\n4.1 tsp oyster sauce\r\n5.Half tsp dark soy\r\n6.1 tsp vinegar\r\n7.1 tbsp flour\r\n8.Half tbsp soy\r\n9.Half glass water\r\n10.Cooking oil\r\n11.4 potatoes, cubes', '1.Step 1\r\nWash and slice thigh. Marinatj with flour and soy. Set aside for 30 mins.\r\n2.Step 2\r\nFirst, pour oil in a wok. Then stir fry potatoes until char then remove.\r\n3.Step 3\r\nIn the same wok sautee onion until soft. Then the chicken.\r\n4.Step 4\r\nStir fry until chicken turn into golden brown. Then pour all the remaining ingredients.\r\n5.Step 5\r\nMix then cover and siimmer until cooked', '2023-06-02 03:56:50', '2023-06-02 03:56:50'),
(5, 6, '230602111617.png', 'Yakiniku Beef Sushi Rice Bowl', 'This rice bowl dish is very quick and easy for me to prepare because I almost always have a bottle of my family’s ‘Yakiniku’ Sauce in the fridge. If you have a store-bought ‘Yakiniku’ Sauce, you can use it. If you don’t have it, don’t give up. I have included a simple alternative sauce in this recipe. Today I seasoned the Rice into Sushi Rice. This is a very filling and comforting dish, that is perfect for my lunch.', 2, 20, '1.1 serving (*about 240g) Cooked Short Grain Rice *should be HOT\r\n2 teaspoons Sugar\r\n3 teaspoons Rice Vinegar\r\n1/5 teaspoon Salt *slightly less than 1/4 teaspoon\r\n\r\nToppings:\r\n1 Egg\r\nSalt & White Pepper\r\nOil for cooking Egg\r\n120 g thinly sliced Beef Steak\r\n9.1 tablespoon ‘Yakiniku’ Sauce *OR use the sauce below\r\n10.1 leaf Iceberg Lettuce *thinly sliced\r\n11.Spring Onion *finely chopped\r\n\r\n‘Yakiniku’ Sauce:\r\n1/2 tablespoon Sugar\r\n1 tablespoon Soy Sauce\r\n1/2 tablespoon Mirin\r\n1/2 teaspoon grated Ginger\r\n1/2 teaspoon grated Garlic\r\n1 teaspoon Toasted Sesame Seeds\r\nChilli Flakes as required *optional', '1.Step 1\r\nPlace HOT cooked Short Grain Rice in a bowl, that can be a serving bowl. Mix Rice Vinegar, Sugar and Salt in a small bowl, and add it to the Rice. Mix well, then set aside.\r\n2.Step 2\r\nCombine all the ‘Yakiniku’ Sauce ingredients in a small bowl.\r\n3.Step 3\r\nWhisk Egg in a small bowl and lightly season with Salt & White Pepper. Heat a small amount of Oil in a small frying pan, and cook Egg into small pieces.\r\n4.Step 4\r\nThinly slice Lettuce, arrange it over the Rice, and arrange Egg over the Lettuce.\r\n5.Step 5\r\nAdd extra Oil to the small pan, cook thinly sliced Beef, add the ‘Yakiniku’ Sauce, and cook until the sauce is thickened. Arrange the Beef on top.\r\n6.Step 6\r\nAdd some finely chopped Spring Onion and enjoy.', '2023-06-02 04:16:17', '2023-06-02 04:18:00'),
(6, 6, '230602111937.png', 'Indomie', 'Just a classic indomie recipe.', 1, 15, '1 pack indomie noodle\r\n4 medium high vit mushrooms\r\n1/4 of a medium sized Green bell pepper\r\n1 thin celery stick\r\n1 Small Onion optional\r\nalmost 2 tablespoons Cooking Oil for stir fry\r\n1Tspn or less jumbo stir fry\r\nUsed pack of its seasoning for stir fry\r\n2 yolk side eggs\r\n2 crushes of black pepper or to taste\r\nalmost 1 teaspoon butter', '1.Step 1\r\nPrep your veggies.rince everything. Grate out celery cut mid and thinly sliced to form fine cubes.can cube thinly the bell pepper too. Slice the mushrooms length wise then strips then cube.not too tiny though just about 4 mm maybe.then add your oil and heat thru.add in yor veggies and they will smell amazing takes very short time sizzling away once done add your knows ov butter nice thick creamy shiny.now add in your 2/3 cookd indomie cover to stem stir in and leave to combine and softness bit\r\n2.Step 2\r\nCan now start your mini stir fry in your small pan/work\r\n\r\n3.Step 3\r\nStart wiv boiling kettle water abit 2/3 mug.then add to your small sufuria /pan.break up your indomie add in heat medium low\r\n\r\n4.Step 4\r\n\r\nTips.:dnt add water to veggies.if you like you can leave indomie in hot water(covered preferably)to softening b4 add to wock ie dnt need to hav 2 cookers on at same time.\r\nWatch not 2 ovr cook.bismillah enjoy delicious with fried egg,or other foods of choice at iftar or suhur meals', '2023-06-02 04:19:37', '2023-06-02 04:19:37'),
(7, 6, '230602112107.png', 'Mango Cupcakes with Dairy Frosting', 'I\'m not a fan of overly sweet pastries. So I came up with a dairy frosting that looks and tastes great but has very low sugar content.', NULL, NULL, 'Filling:\r\n1 large or 2 small, ripe mangos\r\nFew spoons of sugar if the mango is not very sweet\r\nFrosting:\r\n250 g mascarpone or soft cheese\r\n300 ml double cream (single will likely work too)', '1.Step 1\r\nPeel and cut the mango into pieces. Then put it into a food processor / blender and blend it until smooth.\r\n2.Step 2\r\nCook the mango in a pot for about 20 or more minutes, stirring occasionally so it doesn\'t stick to the bottom. The purpose it to remove water. You can add sugar at this step if the mangos are not very sweet or to thicken it. You are basically making a mango jam.\r\n3.Step 3\r\nOnce the mango jam thickens, cool it down. If you don\'t have time, put the pot in a sink with cold water and once sufficiently cool, transfer the pot in the fridge.\r\n4.Step 4\r\nMake holes in the muffins with a knife. They don\'t need to be big. Fill them with the jam. When you\'re done, there should be some left to add to the frosting later. This step is optional. You can also use all the jam for the frosting.\r\n5.Step 5\r\nFor the frosting, beat the double cream in a bowl with a mixer until thick. Don\'t overdo it as it could start separating.\r\n6.Step 6\r\nAdd mascarpone / soft cheese and what is left of the mango jam to the mixture.\r\n7.Step 7\r\nMix gently with a mixer until uniform. If the mixcuture becomes too wet, add a tea spoon of icing sugar or xanthan gum. Add more if needed.\r\n8.Step 8\r\nPut the icing into a piping bag with an open star piping nozzle. The nozzle shape is important as it creates the wavy structure.\r\n9.Step 9\r\nStart on the outside of the base and slowly move to the inside and finish in the center.', '2023-06-02 04:21:07', '2023-06-02 04:21:07'),
(8, 7, '230602114013.png', 'Hot Honey Air Fryer Salmon', 'I tried out cooking salmon in air fryer. This quick and easy Hot Honey Air Fryer Salmon is the ideal dish for busy weeknights. It\'s ready in less than 20 minutes. The flaky salmon is savoury, sweet and so flavourful.\r\nI loved how easy and fast it was to cook salmon in the Air fryer. The marination time was 10 minutes. If you are pressed for time 5 minutes will do.\r\nI started by seasoning the fillets with olive oil, salt and pepper. Then combined, soy sauce, honey, lime juice, chilli flakes and poured it over the salmon. Topped with some minced garlic (you can combine it in the sauce), lime zest and sesame seeds and kept it in the fridge for 10 minutes.\r\nI used dark soy sauce which was what I had. I would recommend light soy.', 4, 30, '4 salmon fillets\r\n5 tbsp. olive oil, divided\r\n1 tsp. chilli flakes\r\nAs required, sesame seeds\r\n1/4 cup soy sauce\r\n2 tbsp. honey\r\n1/2 lime juice\r\n1/2 lime zestAs required, green onion, chopped\r\nAs required, cilantro, chopped\r\n2 cloves garlic, minced\r\nTo taste, salt\r\nTo taste, pepper powder\r\n1/2 cucumber, chopped\r\n2 mangoes, peeled, cubed\r\n1 onion, chopped\r\n1 tbsp. sweet chilli sauce\r\n1 tbsp. apple cider vinegar', '1.Step 1\r\nAdd salmon to a baking dish and pat dry.\r\n2.Step 2\r\nDrizzle olive oil and season both sides with salt and pepper.\r\n3.Step 3\r\nIn a bowl combine 2 tablespoon olive oil, honey lime juice and pour over the fish.\r\n4.Step 4\r\nAdd garlic, lime zest and sesame seeds and keep in fridge for 5-10 minutes.\r\n5.Step 5\r\nSpray air fryer basket with oil and place fillets, skin side down.\r\n6.Step 6\r\nSet temperature to 400f and cook for 10 minutes. (check after 5 minutes as every air fryer temperature is different).\r\n7.Step 7\r\nRemove and garnish with green onion and cilantro, Serve with Mango-Cucumber salad.\r\n8.Step 8\r\nIn a bowl combine mango, cucumber, onion and green onion.\r\n9.Step 9\r\nIn a small bowl combine remaining olive oil, ACV, sweet chilli sauce and pour over the fruit. Mix well.\r\n10.Step 10\r\nGarnish with cilantro.', '2023-06-02 04:40:13', '2023-06-02 04:40:13'),
(9, 7, '230602114330.png', 'Chocolate & Carrot Cupcakes', 'A family favorite chocolate carrot cupcakes, perfect idea for Easter holidays & spring sweet treat. Course: Dessert, Cuisine: American, Diet: vegetarian, nutrients value: Vitamin A, B6, K & potassium.', 6, 40, '1 1/2 cups finely grated carrots \r\n1/2 tsp cinnamon powder\r\n1/4 tsp nutmeg powder\r\n1/4 tsp ginger powder - optional\r\n3/4 tsp baking powder\r\n1/4 tsp baking soda\r\n1/8 tsp salt\r\n5 tbsp chocolate chips - optional\r\n4-5 tbsp cocoa powder\r\n3/4 cup sugar\r\n4-6 tbsp unsalted butter\r\n1/2 tsp vanilla extract\r\n2 eggs \r\n5 tbsp raisins\r\n11/4 cups plain flour\r\n\r\nFor buttercream frosting:\r\n50 g unsalted butter\r\n50 g icing sugar\r\n1 tsp vanilla extract\r\n1 tbsp milk \r\n5 tbsp cocoa powder\r\nMarzipan coloured orange \r\nMarzipan coloured green', '1.Step 1\r\nPreheat the oven to 180°c and line a cupcake baking tin with 12 cups liners, set aside. Sift in a medium bowl, add plain flour, cocoa powder, cinnamon powder, ginger powder, nutmeg powder, baking powder, baking soda and salt, combine all together and set aside the dry ingredients.\r\n2.Step 2\r\nIn a bowl, add butter, sugar, eggs beat together for 2 mins, add vanilla extract mix well, add dry ingredients in the wet mixture, mix gently, add in finely grated carrots and fold into the batter with a spatula. Finally add chocolate chips, raisins and mix gently.\r\n3.Step 3\r\nEvenly distributed the cupcake batter between thecupcake liners, fill each liner to three quarters full, bake the cupcakes for 20 mins or inserted a knife in the center comes out clean, let the cupcakes cool in the baking tin for 10 mins, remove and transfer them to a wire rack to cool completely.\r\n4.Step 4\r\nFor buttercream frosting: in a bowl, add butter, icing sugar beat well, add 1 tbsp milk and mix well, add cocoa powder mix well, finally add vanilla extract mix well, spread on top of the each  cupcake, keep aside. Make carrots from marzipan (coloured orange), and leaves from (coloured green), arrange them on each cupcakes and serve.', '2023-06-02 04:43:30', '2023-06-02 04:43:30'),
(13, 9, '230608011253.png', 'Nasi Stik', 'Juicy steak only 7 minutes in the air-fryer served on garlic rice. A bit of wasabi is the perfect companion or other spices depending on your preference.', 2, 15, '150 g round rice / riz japonica\r\n1 shallot\r\n2 cloves garlic\r\n10 g butter\r\n\r\nSteak marinade:\r\n300 g sirloin steak / faux-fillet\r\nPinch salt and pepper\r\n1 tsp olive oil\r\n1 tsp smoked paprika\r\n1/2 tsp garlic power\r\nDry herbs (oregano/thym or or Herbs de Provence)\r\nSauce\r\n2 tbsp soy sauce / Tamari / Coconut aminos\r\n1/2 lime juice (à defaut utilisez sauce de ponzu)\r\n1 tsp mirin (optional)', '1.Step 1\r\nSoak the rice at least 30 minutes (works for the japonica rice in Europe), but if you use real Japanese or any Asian rice, soak longer and rinse repeatedly.\r\n2.Step 2\r\nMelt the butter in a pan and slowly cook the thinly sliced shallot, add 1 thinly slice garlic. Don’t let it burn, reserve the crispy garlic.\r\n3.Step 3\r\nMeanwhile, marinate the steak. And prepare the sauce (just quickly heat it on a saucepan).\r\n4.Step 4\r\n15 minutes before the rice cooked, put the steak in the air fryer. Cook it 7 minutes at 200°C for medium (mine doesn’t need a preheat, so adjust accordingly). Flip it half way. And let it rest once it’s cooked.\r\n5.Step 5\r\nSauté the cooked rice with the shallot and minced garlic (from the second clove).\r\n6.Step 6\r\nSlice the cooked steak thinly, pour the sauce and serve it on the bed of garlic rice and garnish with thinly slice spring onion or scallion and the crispy sliced garlic.', '2023-06-08 06:12:54', '2023-06-08 06:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `author_id`, `image`, `title`, `step`, `created_at`, `updated_at`) VALUES
(1, 3, '230608120514.png', 'How to keep bananas fresh', 'Do this test at home. Buy a fresh bunch of six bananas. Split them in half, two bunches of three each. Melt a cup of lard. Dip the very tip of one bunch in lard, let cool. Lay both half bunches on fruit platter. The one dipped in lard will stay fresh for 3 weeks on the fruit platter.', '2023-06-02 03:45:54', '2023-06-08 05:05:14'),
(2, 3, '230602105310.png', 'Soy Sauce on Vanilla Ice Cream?', 'A drizzle of soy sauce on vanilla ice cream tastes like butterscotch! Sounds crazy, but it’s true. Start with a little soy sauce at a time and really let the flavors meld in your mouth as you eat.', '2023-06-02 03:53:10', '2023-06-02 04:14:26'),
(3, 4, NULL, 'No waste. Leftover bread', 'Sometimes you forget to put the bread back in the bread bin. Stone hard bread. Put it in the oven on 120 C for about 20 min and put it in the food processor. There are youre breadcrumbs, works with any bread', '2023-06-02 03:57:03', '2023-06-02 04:13:46'),
(4, 4, '230602105723.png', 'Keep brine of pickle to make dressing', 'Add half the amount of oil to the brine. Mix and you have a cheap simple dressing. You can add some mustard to it if you want.', '2023-06-02 03:57:23', '2023-06-02 03:57:23'),
(5, 4, '230602105753.png', 'How to make sour cream', 'Take 75-80% heavy cream. 25-20% milk. 2 tsp (for qty in image) of vinegar or lime juice.\r\nMix well. Then cover it as shown in image and leave it overnight.', '2023-06-02 03:57:53', '2023-06-02 03:57:53'),
(6, 6, NULL, 'How to make crispy fries', 'Mom taught me to make fluffy on the inside, crisp on the outside fries & I\'ve used the method ever since: Peel & cut potatoes into the size fries you like; soak in cold water until starch is released into the water; rinse & soak again; rinse; pat dry; fry. Perfection!', '2023-06-02 04:22:16', '2023-06-02 04:22:16'),
(7, 6, '230602112303.png', 'Roasting veggies', 'Like a cast iron pan with a tinfoil boat -drizzle with olive oil, squeeze of lemon and salt for a cleanup free veggie side dish!', '2023-06-02 04:23:03', '2023-06-02 04:23:03'),
(8, 6, NULL, 'Easy peel boiled eggs', 'When peeling boiled eggs there\'s always a chance of getting janky looking eggs. To make things easier, add 1 tsp of salt and 1 tbsp baking soda to the water. The boiling water, salt and soda help break down the calcium in the egg shells. When you peel your eggs, the shell should easily slide off, leaving the perfect egg.', '2023-06-02 04:23:24', '2023-06-02 04:23:24'),
(9, 7, NULL, 'A richer chocolate taste', 'I almost always add a bit of strong coffee to recipes with chocolate. If a recipe calls for cocoa, substitute a teaspoon of instant espresso for a teaspoon of the cocoa. If a recipe calls for melted chocolate, substitute a shot of espresso for the same amount of liquid in the recipe.', '2023-06-02 04:44:56', '2023-06-02 04:44:56'),
(11, 5, '230602114939.jpg', 'How to make mug cakes moist', 'The secret ingredient to all mug cakes is YOGURT! [I recommend Greek yoghurt]. For one mug cake mixture, it’s about 2 tablespoons of yoghurt. You can use this in any recipe of mug cakes!', '2023-06-02 04:49:39', '2023-06-02 04:49:39'),
(12, 5, '230602115107.jpg', 'What to do with cookie crumbs', 'I had crumbs from the monster cookies I made from Thanksgiving and I don\'t like wasting any food so I added some yogurt to my cookie crumbs and mixed and it was so good I wished I had more.', '2023-06-02 04:51:07', '2023-06-02 04:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `tipscomments`
--

CREATE TABLE `tipscomments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tips_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipscomments`
--

INSERT INTO `tipscomments` (`id`, `user_id`, `tips_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Never expected this to be good! Thank you!', '2023-06-02 04:09:42', '2023-06-02 04:09:42'),
(2, 6, 5, 'Thank you Annisa!', '2023-06-02 04:35:09', '2023-06-02 04:35:09'),
(3, 6, 1, 'Thank you for the tips!', '2023-06-02 04:36:47', '2023-06-02 04:36:47'),
(4, 7, 2, 'I know, right! I tried this and it tasted amazing.', '2023-06-02 04:46:17', '2023-06-02 04:46:17'),
(5, 7, 8, 'Thanks for the tips, Afrita!', '2023-06-02 04:46:38', '2023-06-02 04:46:38'),
(6, 5, 9, 'I just made a mug cake with some coffee, it tasted amazing', '2023-06-02 04:53:38', '2023-06-02 04:53:38'),
(7, 5, 4, 'Thanks Annisa!', '2023-06-02 04:57:55', '2023-06-02 04:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `image`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_0', 'admin', 'admin@gmail.com', '230602074813.png', '$2y$10$39AHaseMW..Yr9yiBnzGf.e48rwkoIgfTydVBF6FHEi7xPyto1i6C', 'admin', '2023-06-01 10:47:03', '2023-06-02 12:48:13', NULL),
(2, 'user_1', 'User', 'user@gmail.com', NULL, '$2y$10$fMZry59AnOKmb7WedvjY2.XKthzk0u4dxSD/aetpckcLLScUmClV2', 'user', '2023-06-01 10:49:19', '2023-06-02 12:38:06', NULL),
(3, 'davidhartono', 'David Hartono', 'davidhartono04@gmail.com', '230602050802.jpg', '$2y$10$dH6k3AyG1GSJ2hYe4p7Oaee7aJyO6vlW19pOtMRgJ7cW5k5OUJbCi', 'user', '2023-06-01 10:49:44', '2023-06-08 06:19:19', NULL),
(4, 'sazuuu', 'Annisa Cahyani', 'annisaaa.cnn@gmail.com', '230602051007.jpg', '$2y$10$zh7Ob6FkiCthL/ghD.ZrPeEyzPByu/RK3b8jOhv1CKiru2ynJjZDS', 'user', '2023-06-01 21:43:59', '2023-06-01 22:10:07', NULL),
(5, 'diki_ginting', 'Diki Ginting', 'diki@gmail.com', NULL, '$2y$10$kHyGq7TAn0tLK8e3oYOK0.yMzx0Nk3vHR38m.Igt9oa2lynCoIt.O', 'user', '2023-06-01 21:45:51', '2023-06-02 04:51:57', NULL),
(6, 'afrita04_', 'Afrita Sinaga', 'afritasinaga04@gmail.com', '230602050850.jpg', '$2y$10$L/l9mSHcUAt/IuBi1fS9q.UbnN2q9E1jWM/O.ruSsXiqaN2MNW3ci', 'user', '2023-06-01 21:46:27', '2023-06-01 22:08:50', NULL),
(7, 'urijichuyaa', 'Desilia Song', 'desilia_song@gmail.com', '230602050930.jpg', '$2y$10$Mr5iInBzME0J9kGQ1vifD.JTS7aREw2QLpnYpPtbgKgWtWv3opfUC', 'user', '2023-06-01 21:46:43', '2023-06-02 04:46:44', NULL),
(8, 'winzzliu', 'Alwin Liufandy', 'alwin@gmail.com', NULL, '$2y$10$enLewwZAku0AMeuvyn.PjO37XFo04pLBR6Cmh2cprdpFc6eksE3we', 'user', '2023-06-02 07:16:59', '2023-06-08 05:33:39', NULL),
(9, 'user_8', 'David', 'tester@gmail.com', '230608011359.png', '$2y$10$RIhvPDDsXP1iHb00RdSgfOBqvIfTHHbG6NURVG4Ik00DzIrrl9azS', 'user', '2023-06-08 06:11:29', '2023-06-08 06:13:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_author_id_foreign` (`author_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_author_id_foreign` (`author_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipecomments`
--
ALTER TABLE `recipecomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipecomments_user_id_foreign` (`user_id`),
  ADD KEY `recipecomments_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_author_id_foreign` (`author_id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tips_author_id_foreign` (`author_id`);

--
-- Indexes for table `tipscomments`
--
ALTER TABLE `tipscomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipscomments_user_id_foreign` (`user_id`),
  ADD KEY `tipscomments_tips_id_foreign` (`tips_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipecomments`
--
ALTER TABLE `recipecomments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tipscomments`
--
ALTER TABLE `tipscomments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipecomments`
--
ALTER TABLE `recipecomments`
  ADD CONSTRAINT `recipecomments_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipecomments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `tips_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tipscomments`
--
ALTER TABLE `tipscomments`
  ADD CONSTRAINT `tipscomments_tips_id_foreign` FOREIGN KEY (`tips_id`) REFERENCES `tips` (`id`),
  ADD CONSTRAINT `tipscomments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
