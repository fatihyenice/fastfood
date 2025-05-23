<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SnackExpress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="assets/style/global.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/app.js" defer></script>

</head>

<body>
    <div class="modal-loading" id="loader">
        <div class="spinner"></div>
    </div>

    <?php require_once "header.html.php"; ?>

    <section id="home" class="page">
        <div class="jecommande"></div>

        <div id="modalcommande">
            <div id="modalcommande--droite">
                <div class="modalcommande-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>
        </div>

        <section id="big--home_section">
            <div class="big--home_filtre">
                <div class="big--home_textdisposition">
                    <h1>Bienvenue chez SnackExpress </h1>
                    <h2>Le goût rapide, frais et savoureux à chaque bouchée !</h2>
                    <a href="#nos-restaurants_section"><button type="button">VOIR LES MENUS <i class="ri-file-list-3-line"></i></button></a>
                </div>
            </div>
        </section>

        <section id="nos-restaurants_section">
            <h2>Une petite ou une grosse faim ? 🍔</h2>
            <div class="container--menus">
                <?php
                foreach ($afficherProduits as $produit) {
                ?>
                    <div class="menus" data-aos="zoom-in" data-id-produit="<?= hsc($produit['id_produits']); ?>">
                        <div class="menus--image" style="background-image: url(<?= hsc($produit['urlimage_produits']); ?>) !important;"></div>
                        <div class="menus--title">
                            <span><?= hsc($produit['nom_produits']); ?></span>
                            <span class="menus--prix"><?= hsc($produit['prix_produits']); ?>€</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </section>

    <section id="order" class="page hidden">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore ducimus totam corporis asperiores, illum maiores minima, aliquam esse reprehenderit odio id doloribus, unde at. Repellat at nobis ipsum quidem unde.
        Ullam magnam temporibus eligendi harum deserunt, tempore corrupti molestias accusantium distinctio modi quae non, voluptas ex, iure dolorem neque. Aspernatur quam reiciendis assumenda quas in quod debitis hic tempore non?
        Modi nihil dolor animi error labore. Iure, dolores, culpa odit eos ipsa, expedita pariatur sit maiores doloribus accusamus tenetur repellendus voluptates quae. Iusto magni doloremque aliquam blanditiis minima, earum corporis.
        Aliquam, odio ducimus. Ex at repudiandae aut numquam alias esse enim sint praesentium rerum. Eum, quos qui consequuntur cumque similique facere dolor nisi fugit minus! Voluptatibus, laborum! Facilis, eveniet ratione!
        Nisi officiis quibusdam itaque id. Obcaecati accusantium cupiditate consequuntur vel, tempore a magnam ullam voluptatem quam distinctio provident cum voluptates expedita nihil voluptatibus aliquid nesciunt eum debitis, molestiae quis esse.
        Corrupti ducimus, facilis reprehenderit itaque minima iure ad suscipit quia aut quas exercitationem optio obcaecati voluptas maiores debitis fuga delectus. Molestiae tenetur fuga odio rem repudiandae facilis dicta assumenda a?
        Explicabo impedit ut mollitia molestiae ducimus ab dolorem architecto? Fuga illum pariatur nemo minima quia ut error, dolorem id incidunt exercitationem aliquam ea laborum debitis voluptas, tenetur dolor nam maiores.
        Tenetur deserunt neque accusamus eligendi quam, itaque iusto nostrum id, recusandae totam necessitatibus quasi explicabo alias laborum, adipisci suscipit sed obcaecati quis odit fuga temporibus. Tempore ratione perferendis ex accusamus.
        Delectus ab minima natus numquam consequatur iusto laboriosam consectetur, eum quae totam eveniet, accusamus fugit recusandae quasi ex corrupti labore quia incidunt dolore! Commodi, veniam veritatis reprehenderit nulla officiis accusantium.
        Aliquid quod aperiam eius ad temporibus facere perferendis itaque pariatur hic voluptate accusantium, deleniti sit praesentium sequi, harum officia assumenda maxime sunt neque! Corporis, facere laborum temporibus maiores odit accusantium?
        Assumenda fuga atque earum facere? Nisi nostrum nesciunt incidunt. Dolores tempore eius at molestiae animi velit pariatur magnam fugiat! Itaque velit dolorem quo, sint minima quibusdam officia explicabo recusandae. Optio.
        Ut aliquam id exercitationem molestias nisi provident, qui aliquid, voluptatem aspernatur quas itaque laborum officiis voluptas, architecto blanditiis explicabo? Ducimus commodi maiores earum, omnis ut nam ea corporis optio repellat?
        Eius placeat iure natus cum voluptate molestias nemo omnis molestiae dicta? Perspiciatis hic amet alias corporis enim quaerat debitis praesentium nemo qui eos atque ut consequuntur in rerum, pariatur cum.
        Accusamus reprehenderit aliquid atque illum saepe, nulla iste asperiores recusandae, quasi, magni soluta qui aliquam officiis? Veniam error sed repellendus, quam perspiciatis facilis corrupti voluptate alias nihil. Ullam, laboriosam in.
        Ipsum at id suscipit porro ut quasi officia distinctio, alias esse doloremque, voluptatum perferendis expedita minus delectus, cum quod velit? Id ducimus odit natus ex ab magnam voluptatibus quod quibusdam!
        Non atque voluptate perspiciatis a animi autem dolores alias placeat reprehenderit, recusandae voluptatem quos dicta magnam aliquam deleniti. Reiciendis, non. Quaerat excepturi commodi ex dignissimos nemo. Est nam sint molestiae.
        Et, laborum molestiae? Labore, suscipit quasi? Ab dolor fugit molestias totam corporis repudiandae eos veritatis animi! Incidunt, tenetur fuga asperiores reiciendis impedit ratione iusto, fugit in optio quos ipsum labore?
        Tenetur ad possimus corrupti atque est. Molestias tempora quasi repellendus minima, dolore, labore libero veniam ex saepe recusandae cumque ad dignissimos? Delectus, facere aspernatur. Officia nam molestias quos dolorem quam.
        Sunt voluptatibus tempore consectetur nesciunt sit dolore maiores deleniti placeat illo enim id voluptates quas eum, consequuntur, nam, quidem ipsam unde accusamus. Molestiae veritatis magnam assumenda est temporibus facilis quasi.
        Delectus aliquam vitae fugit, officia nam est deserunt voluptatem perferendis sint commodi maiores molestias quidem fuga, laudantium illo voluptatibus quis error, sapiente a assumenda quisquam animi. Facere iusto molestias ducimus.
        Doloribus voluptas maiores laudantium nesciunt eum molestias esse quidem debitis nemo praesentium, neque error quisquam dolores totam repellat temporibus fugit voluptates reprehenderit accusantium magnam! Itaque dolorum expedita hic ducimus nam.
        Inventore veritatis aliquid nobis ut id perspiciatis et consectetur delectus possimus. Dolore accusantium voluptatum doloremque adipisci iusto dicta nesciunt nobis! Voluptatum soluta minima magnam est distinctio officia delectus voluptas dolorem!
        Quis quo, necessitatibus iusto esse unde, quae perferendis fugit delectus expedita et repudiandae. Quas, cupiditate nulla saepe harum aperiam unde amet vel quia itaque debitis nostrum aliquid quis, at tempore!
        Sed, modi! At aliquam optio consequuntur debitis assumenda vero voluptatum dolorum laudantium quisquam, reiciendis placeat earum culpa temporibus, modi fugiat doloremque rem molestias quo nulla, eveniet vel facilis atque accusantium?
        Repellendus officia libero earum repellat, quidem labore non porro eius. Fugiat nisi numquam debitis hic aliquam molestias saepe. Reiciendis totam optio mollitia molestiae quo voluptatem voluptatibus ex harum. Optio, impedit?
        Voluptatibus totam, dolorum id earum qui in inventore quae. Consectetur, iusto doloremque tempora facere quae deserunt esse soluta ex ratione dolore, aspernatur itaque recusandae labore aut. Tempora facilis obcaecati voluptate.
        Praesentium exercitationem qui quisquam totam quis accusantium magnam numquam aliquid, explicabo reiciendis tempora facilis voluptate deleniti reprehenderit rerum quia doloribus suscipit adipisci sit vero nobis? Quo iure vel cumque illum.
        Expedita voluptas ex ullam doloremque modi minus aperiam delectus aliquid asperiores, nihil nisi nemo molestiae, hic architecto! Facere sequi quae tempora iste, eveniet assumenda nemo minima adipisci dolore! Possimus, veritatis!
        Sequi cupiditate alias itaque, adipisci cumque dolorum laborum reiciendis dolore assumenda, est temporibus fugit! Itaque dignissimos a debitis sunt doloremque, quae architecto placeat molestias, cum nisi molestiae, dolore dolor vero.
        Vero officiis veniam et tempora porro! Quae voluptatem vel totam, sunt laboriosam harum eius numquam eos dolores reiciendis voluptatibus repudiandae adipisci autem possimus non at quasi soluta dolor consequuntur ad?
        Eveniet quas doloribus quia vel, reiciendis, sed voluptas, quam nam repellendus culpa obcaecati numquam libero dolores animi a? Neque architecto cumque nemo sequi eius consequatur qui molestias provident dolore distinctio.
        Illo non, libero sequi consequuntur cupiditate quam nostrum veniam, corrupti, adipisci in quaerat dolore fuga harum at nulla eaque hic culpa impedit sed facere tempore necessitatibus dicta. Labore, voluptatibus distinctio?
        Repudiandae eaque perspiciatis, cum id autem ratione tenetur. Totam necessitatibus ad veritatis quos cum at ea non minus harum, consequuntur deleniti expedita quisquam dolorum, odit nihil dolore tempore asperiores rem?
        Vero quibusdam nulla porro! Quis nemo placeat aut provident? Perspiciatis alias, ullam earum rem assumenda excepturi animi fugit facere, nesciunt esse distinctio architecto eveniet ex molestias cumque sed ducimus enim.
        Assumenda numquam odio, cum dicta sed harum deserunt quas qui facilis, delectus aperiam voluptatum aliquid dolor minus incidunt sunt aspernatur earum, laborum ducimus eius fugit. Harum veniam exercitationem dolore corrupti!
        Voluptate veritatis nisi facilis unde minus neque nobis quia soluta dolore dignissimos voluptatum numquam aliquam veniam debitis culpa, mollitia, ullam incidunt, beatae commodi autem! Pariatur non voluptates nobis ipsum consequuntur!
        Tempora, eligendi expedita, nihil fugit laborum nulla quod hic est adipisci officiis, soluta accusantium. Sed corrupti unde illo vel dignissimos libero, praesentium non blanditiis fuga, obcaecati assumenda. Commodi, ex quia!
        Ratione adipisci, alias nam qui, voluptatum facere ea eum architecto et temporibus ipsam laborum. Omnis tempora, velit quos quibusdam hic delectus corrupti, ipsa ipsam soluta dignissimos ullam debitis nulla praesentium?
        Corrupti architecto rem natus molestias hic mollitia fugit facere necessitatibus non dolorem, veniam quae ut aliquam enim! Doloribus odit voluptatibus, ex quisquam culpa ipsum nostrum perspiciatis commodi, temporibus veritatis laborum?
        Nisi modi culpa veritatis eligendi, saepe amet quo ut recusandae iusto voluptatem placeat iste exercitationem harum. Repellendus quo quod corrupti quas tempora nemo possimus incidunt. Quia inventore consectetur eius est.
        Explicabo omnis, eligendi similique nobis provident quae necessitatibus? Rerum esse suscipit delectus at id sit quibusdam eos laboriosam blanditiis. Dignissimos at cupiditate dolorum delectus non quam officiis tenetur, est sapiente.
        Magni ea rem, iusto in veritatis nobis maxime recusandae molestias est eius alias laboriosam ad voluptatum! Exercitationem ducimus natus rerum ipsa aspernatur tempora deleniti harum soluta nam magnam, maxime dicta?
        Labore cumque, velit excepturi facilis sed quia quas saepe enim officiis beatae nihil pariatur asperiores, aspernatur optio officia libero corrupti nisi ut nobis perferendis ducimus. Perspiciatis minima a magnam vero.
        Quaerat, ducimus minus? Aspernatur vel illo quis quos itaque earum saepe omnis facere quod corrupti expedita, laudantium dolorum magnam impedit odio nobis voluptatum similique recusandae suscipit, inventore placeat, voluptate molestias.
        Dolor veniam mollitia fugit doloremque odit illo nemo placeat, nulla ipsam, expedita pariatur possimus cumque voluptatem ratione dolorum unde nobis nisi maiores inventore exercitationem. Consequuntur quia impedit deserunt iste nobis!
        Laboriosam doloribus libero quidem accusamus ratione vero? Reprehenderit ab non exercitationem enim consequatur voluptatibus temporibus quia delectus voluptas nostrum totam quasi quod dicta unde quae, eum, illum obcaecati. Nemo, quam!
        Saepe in alias obcaecati? Quia obcaecati officia saepe aperiam consectetur beatae optio, eaque consequuntur hic reiciendis. Illo iusto mollitia magni ad perspiciatis, perferendis aliquid beatae sint similique, eum pariatur omnis!
        Voluptates iste sapiente tempore blanditiis. Nisi veniam similique, harum ad a tenetur facere quos quaerat iusto totam aliquid esse deleniti aperiam animi natus odio! Temporibus perferendis pariatur consequuntur. Temporibus, error.
        Inventore culpa fuga aut nemo et ea, odit neque eius, earum quia sequi veritatis saepe assumenda voluptas nesciunt? Quod rem ex praesentium vel tempora temporibus ad architecto quo dicta possimus?
        Quae, saepe. Quisquam eaque ut autem rem, quo quam voluptates nihil explicabo esse nostrum illo maiores labore doloremque facilis fugiat distinctio? Eaque possimus doloribus ab vel impedit corrupti sit doloremque.
    </section>

    <section id="searchresto" class="page hidden">
        Chercher un restaurant
    </section>
</body>

</html>