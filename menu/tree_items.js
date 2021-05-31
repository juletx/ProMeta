/* --- menu items --- */
var TREE_ITEMS =
  [
    ['ProMeta Proiektua', '../main/home_page.html',
      ['Portada', '../Proiektua/Memoria/Portada.pdf'],
      ['Laburpen Posterra', '../Proiektua/Laburpen Posterra.pdf'],
      ['Aurkezpena', '../Proiektua/Aurkezpena.pdf'],
      ['Aurkibide Orokorra', '../Proiektua/Memoria/Aurkibide Orokorra.pdf'],
      ['Memoria', '../Proiektua/Memoria/Memoria.pdf',
        ['Portada', '../Proiektua/Memoria/Portada.pdf'],
        ['Laburpena', '../Proiektua/Memoria/Laburpena.pdf'],
        ['Aurkibide Orokorra', '../Proiektua/Memoria/Aurkibide Orokorra.pdf'],
        ['Irudien Aurkibidea', '../Proiektua/Memoria/Irudien Aurkibidea.pdf'],
        ['Taulen Aurkibidea', '../Proiektua/Memoria/Taulen Aurkibidea.pdf'],
        ['1 - Sarrera', '../Proiektua/Memoria/1 - Sarrera.pdf'],
        ['2 - Helburua', '../Proiektua/Memoria/2 - Helburua.pdf'],
        ['3 - Aurrekariak', '../Proiektua/Memoria/3 - Aurrekariak.pdf'],
        ['4 - Egungo Egoera', '../Proiektua/Memoria/4 - Egungo Egoera.pdf',
          ['4.1 - Egungo Egoeraren Deskribapena', '../Proiektua/Memoria/4 - Egungo Egoera.pdf'],
          ['4.2 - Identifikatutako Hutsuneen Laburpena', '../Proiektua/Memoria/4 - Egungo Egoera.pdf']
        ],
        ['5 - Arauak eta Erreferentziak', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf',
          ['5.1 - Aplikatutako Legedia eta Araudia', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf'],
          ['5.2 - Bibliografia', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf'],
          ['5.3 - Metodoak, Tresnak, Ereduak, Metrikak eta Prototipoak', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf',
            ['5.3.1 - Metodoak eta Tresnak', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf'],
            ['5.3.2 - Ereduak, Metrikak eta Prototipoak', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf']
          ],
          ['5.4 - Idazketaren Kalitatearen Kudeaketa Plana', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf'],
          ['5.5 - Beste Erreferentziak', '../Proiektua/Memoria/5 - Arauak eta Erreferentziak.pdf']
        ],
        ['6 - Definizioak eta Laburdurak', '../Proiektua/Memoria/6 - Definizioak eta Laburdurak.pdf'],
        ['7 - Hasierako Betekizunak', '../Proiektua/Memoria/7 - Hasierako Betekizunak.pdf'],
        ['8 - Irismena', '../Proiektua/Memoria/8 - Irismena.pdf'],
        ['9 - Hipotesiak eta Murriztapenak', '../Proiektua/Memoria/9 - Hipotesiak eta Murriztapenak.pdf'],
        ['10 - Aukeren Azterketa eta Bideragarritasuna', '../Proiektua/Memoria/10 - Aukeren Azterketa eta Bideragarritasuna.pdf'],
        ['11 - Proposatutako Sistemaren Deskribapena', '../Proiektua/Memoria/11 - Proposatutako Sistemaren Deskribapena.pdf'],
        ['12 - Arriskuen Analisia', '../Proiektua/Memoria/12 - Arriskuen Analisia.pdf'],
        ['13 - Proiektuaren Antolamendua eta Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf',
          ['13.1 - Proiektuaren Antolamendua', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf',
            ['13.1.1 - Proiektuaren Aktoreak eta Erlazioak', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.1.2 - Barne Egitura', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.1.3 - Kanpo Interfazeak', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.1.4 - Rolak eta Ardurak', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf']
          ],
          ['13.2 - Proiektuaren Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf',
            ['13.2.1 - Integrazioaren Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.2 - Irismenaren Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.3 - Epeen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.4 - Produktuaren Kostuen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.5 - Kalitate Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.6 - Giza Baliabideen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.7 - Komunikazioen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.8 - Arriskuen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.9 - Erosketen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
            ['13.2.10 - Interesatuen Kudeaketa', '../Proiektua/Memoria/13 - Proiektuaren Kudeaketa eta Antolamendua.pdf'],
          ]
        ],
        ['14 - Denbora Planifikazioa', '../Proiektua/Memoria/14 - Denbora Planifikazioa.pdf',
          ['14.1 - Proiektu Planaren Eboluzioa', '../Proiektua/Memoria/14 - Denbora Planifikazioa.pdf'],
          ['14.2 - Hornitzailearen Proiektu Planaren Ebaluazioa', '../Proiektua/Memoria/14 - Denbora Planifikazioa.pdf'],
        ],
        ['15 - Aurrekontuaren Laburpena', '../Proiektua/Memoria/15 - Aurrekontuaren Laburpena.pdf'],
        ['16 - Dokumentuen Lehentasun Ordena', '../Proiektua/Memoria/16 - Dokumentuen Lehentasun Ordena.pdf']
      ],
      ['Memoriaren Eranskinak', '../Proiektua/Memoriaren Eranskinak/Memoriaren Eranskinak.pdf',
        ['A1 - Sarrerako Dokumentazioa', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/A1 - Sarrerako dokumentazioa.pdf',
          ['A1.1 - Aurreko Proiektuak', '../Barne Informazioa/Aurreko Proiektuak/Aurreko Proiektuak.pdf',
            ['A1.1.1 - ProMeta 2021', 'https://juletx.github.io/ProMeta',
              ['A1.1.1.1 - ProMeta Webgunea', 'https://juletx.github.io/ProMeta'],
              ['A1.1.1.2 - ProMeta Kodea', 'https://github.com/juletx/ProMeta'],
              ['A1.1.1.3 - ProMeta ModelEditor', 'https://juletx.github.io/ProMeta-ModelEditor'],
              ['A1.1.1.4 - ProMeta ModelEditor Kodea', 'https://github.com/juletx/ProMeta-ModelEditor'],
              ['A1.1.1.5 - ProMeta IO-System', 'https://live-prometa.pantheonsite.io'],
              ['A1.1.1.6 - ProMeta IO-System Kodea', 'https://github.com/juletx/ProMeta-IO-System'],
            ],
            ['A1.1.2 - ProWF 2020', 'https://juletx.github.io/ProWF',
              ['A1.1.2.1 - ProWF Webgunea', 'https://juletx.github.io/ProWF'],
              ['A1.1.2.2 - ProWF Kodea', 'https://github.com/juletx/ProWF'],
              ['A1.1.2.3 - ProWF WorkflowEditor', 'https://github.com/juletx/ProWF-WorkflowEditor'],
              ['A1.1.2.4 - ProWF IO-System', 'https://github.com/juletx/ProWF-IO-System'],
            ],
            ['A1.1.3 - BETRADOK 2019', 'https://juletx.github.io/BETRADOK',
              ['A1.1.3.1 - BETRADOK Webgunea', 'https://juletx.github.io/BETRADOK'],
              ['A1.1.3.2 - BETRADOK Kodea', 'https://github.com/juletx/BETRADOK'],
            ],
          ],
          ['A1.2 - Metodologiak', null,
            ['A1.2.1 - OpenUp 1.0', 'http://www.utm.mx/~caff/doc/OpenUPWeb/index.htm'],
            ['A1.2.2 - OpenUp 1.5', 'https://420-gel-hy.github.io/EPF/openup/index.htm'],
            ['A1.2.3 - ABRD', 'https://420-gel-hy.github.io/EPF/ARBD/index.htm'],
            ['A1.2.4 - EPF Practices', 'https://420-gel-hy.github.io/EPF/EPF/index.htm'],
          ],
          ['A1.3 - Arauak', null,
            ['A1.3.1 - CCII-N2016-01', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/CCII-N2016-01.pdf'],
            ['A1.3.2 - CCII-N2016-02', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/CCII-N2016-02.pdf'],
            ['A1.3.3 - CCII-UNE 157801', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/CCII-UNE 157801.pdf'],
            ['A1.3.4 - CCII Txantiloia', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/CCII Txantiloia.pdf'],
            ['A1.3.5 - GrAL Eredua', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/GrAL Eredua.pdf'],
            ['A1.3.5 - GrAL Araudia UPV-EHU', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/GrAL Araudia UPV-EHU.pdf'],
            ['A1.3.5 - GrAL Araudia Informatika Fakultatea', '../Proiektua/Memoriaren Eranskinak/A1 - Sarrerako dokumentazioa/GrAL Araudia Informatika Fakultatea.pdf'],
          ],
        ],
        ['A2 - Analisia eta Diseinua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/A2 - Analisia eta Diseinua.pdf',
          ['A2.1 - Arkitektura Koadernoa', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/architecture_notebook_tpl.pdf'],
          ['A2.2 - Analisiaren Eredua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/RUP Analysis Model/index.html'],
          ['A2.3 - Diseinuaren Eredua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/design_tpl.pdf',
            ['A2.3.1 - Interfazeen Diseinua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/design_tpl.pdf'],
            ['A2.3.2 - Datu Ereduen Diseinua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/design_tpl.pdf'],
            ['A2.3.3 - Inplementazioaren Diseinua', '../Proiektua/Memoriaren Eranskinak/A2 - Analisia eta Diseinua/design_tpl.pdf']
          ]
        ],
        ['A3 - Tamaina eta Esfortzu Estimazioa', '../Proiektua/Memoriaren Eranskinak/A3 - Tamaina eta Esfortzu Estimazioa/A3 - Tamaina eta Esfortzu Estimazioa.pdf'],
        ['A4 - Kudeaketa Plana', '../Proiektua/Memoriaren Eranskinak/A4 - Kudeaketa Plana/A4 - Kudeaketa Plana.pdf'],
        ['A5 - Segurtasun Plana', '../Proiektua/Memoriaren Eranskinak/A5 - Segurtasun Plana/A5 - Segurtasun Plana.pdf'],
        ['A6 - Beste Eranskinak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/A6 - Beste Eranskinak.pdf',
          ['A6.1 - Hedapena', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/0_hedapena.pdf',
            ['A6.1.1 - Produktuaren Dokumentazioa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Product Documentation.pdf'],
            ['A6.1.2 - Laguntza Dokumentazioa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Support Documentation.pdf'],
            ['A6.1.3 - Erabiltzaile Dokumentazioa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/User Documentation.pdf'],
            ['A6.1.4 - Trebatzeko Materialak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Training Materials.pdf'],
            ['A6.1.5 - Backout Plana', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Backout Plan.pdf'],
            ['A6.1.6 - Hedapen Plana', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/rup_dplpln_tpl.pdf'],
            ['A6.1.7 - Azpiegitura', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Infrastructure.pdf'],
            ['A6.1.8 - Entrega Komunikazioak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/rup_relnt_tpl.pdf'],
            ['A6.1.9 - Entrega Kontrolak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf',
              ['A6.1.9.1 - Pre-Alfa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.2 - Alfa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.3 - Beta', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.4 - Definitibo-kandidatua', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.5 - Erabilgarria', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.6 - Ez egonkorra', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf'],
              ['A6.1.9.7 - Egonkorra', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release Controls.pdf']
            ],
            ['A6.1.10 - Entrega', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Hedapena/Release.pdf'],
          ],
          ['A6.2 - Garapena', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Garapena/0_garapena.pdf',
            ['A6.2.1 - Inplementazioa', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Garapena/Implementation.pdf'],
            ['A6.2.2 - Build', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Garapena/Build.pdf'],
            ['A6.2.3 - Garatzaileen Probak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Garapena/Developer Tests.pdf'],
            ['A6.2.4 - Diseinua', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Garapena/design_tpl.pdf']
          ],
          ['A6.3 - Ingurunea', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Ingurunea/0_ingurunea.pdf',
            ['A6.3.1 - Garapen Kasua', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Ingurunea/development_case_tpl.pdf'],
            ['A6.3.2 - Tresnak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Ingurunea/tools.pdf'],
          ],
          ['A6.4 - Proba', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Proba/0_probak.pdf',
            ['A6.4.1 - Proba Kasuak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Proba/test_cases_tpl.pdf'],
            ['A6.4.2 - Proba Log-ak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Proba/test_log.pdf'],
            ['A6.4.3 - Proba Script-ak', '../Proiektua/Memoriaren Eranskinak/A6 - Beste Eranskinak/Proba/test_script_tpl.pdf']
          ]
        ]
      ],
      ['Sistemaren Espezifikazioa', '../Proiektua/Sistemaren Espezifikazioa/Sistemaren Espezifikazioa.pdf',
        ['1 - Glosategia', '../Proiektua/Sistemaren Espezifikazioa/Glosategia.pdf'],
        ['2 - Ikuspegia', '../Proiektua/Sistemaren Espezifikazioa/Ikuspegia.pdf'],
        ['3 - Betebeharren Espezifikazioa', '../Proiektua/Sistemaren Espezifikazioa/Betebeharren Espezifikazioa.pdf'],
        ['4 - Erabilpen Kasuak', '../Proiektua/Sistemaren Espezifikazioa/Erabilpen Kasuak/usecase_specification_tpl.pdf',
          ['4.1 - Erabilpen Kasua', '../Proiektua/Sistemaren Espezifikazioa/Erabilpen Kasuak/usecase_specification_tpl.pdf']
        ],
        ['5 - Erabilpen Kasuen Eredua', '../Proiektua/Sistemaren Espezifikazioa/Use Case Model/index.html']
      ],
      ['Aurrekontua', '../Proiektua/Aurrekontua/Aurrekontua.pdf'],
      ['Ikerlanak', '../Proiektua/Ikerlanak/Ikerlanak.pdf'],
    ],
    ['ProMeta Barne Informazioa', '../Barne Informazioa/Barne Informazioa.pdf',
      ['1 - Barne Kudeaketa', '../Barne Informazioa/Barne Kudeaketa/Barne Kudeaketa.pdf',
        ['1.1 - Proiektu Plana', '../Barne Informazioa/Barne Kudeaketa/Proiektu Plana.pdf'],
        ['1.2 - Iterazio Planak', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Planak.pdf',
          ['1.2.1 - Iterazio Plana 1', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Plana 1.pdf'],
          ['1.2.2 - Iterazio Plana 2', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Plana 2.pdf'],
          ['1.2.3 - Iterazio Plana 3', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Plana 3.pdf'],
          ['1.2.4 - Iterazio Plana 4', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Plana 4.pdf'],
          ['1.2.5 - Iterazio Plana 5', '../Barne Informazioa/Barne Kudeaketa/Iterazio Planak/Iterazio Plana 5.pdf'],
        ],
        ['1.3 - Lan Atazen Zerrenda', '../Barne Informazioa/Barne Kudeaketa/Lan Atazen Zerrenda.pdf'],
        ['1.4 - Arrisku Zerrenda', '../Barne Informazioa/Barne Kudeaketa/Arrisku Zerrenda.pdf'],
        ['1.5 - Hizkuntza Hitzarmena', '../Barne Informazioa/Barne Kudeaketa/Hizkuntza Hitzarmena.pdf'],
        ['1.6 - Bilera Aktak', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/Bilera Aktak.pdf',
          ['1.6.1 - 2020-10-29', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2020-10-29.pdf'],
          ['1.6.2 - 2020-11-06', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2020-11-06.pdf'],
          ['1.6.3 - 2021-01-15', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-01-15.pdf'],
          ['1.6.4 - 2021-01-21', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-01-21.pdf'],
          ['1.6.5 - 2021-02-04', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-02-04.pdf'],
          ['1.6.6 - 2021-02-11', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-02-11.pdf'],
          ['1.6.7 - 2021-02-18', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-02-18.pdf'],
          ['1.6.8 - 2021-02-25', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-02-25.pdf'],
          ['1.6.9 - 2021-03-04', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-03-04.pdf'],
          ['1.6.10 - 2021-03-11', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-03-11.pdf'],
          ['1.6.11 - 2021-03-18', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-03-18.pdf'],
          ['1.6.12 - 2021-03-25', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-03-25.pdf'],
          ['1.6.13 - 2021-03-29', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-03-29.pdf'],
          ['1.6.14 - 2021-04-13', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-04-13.pdf'],
          ['1.6.15 - 2021-04-22', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-04-22.pdf'],
          ['1.6.16 - 2021-04-29', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-04-29.pdf'],
          ['1.6.17 - 2021-05-21', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-05-21.pdf'],
          ['1.6.18 - 2021-05-28', '../Barne Informazioa/Barne Kudeaketa/Bilera Aktak/2021-05-28.pdf'],
        ],
      ],
      ['2 - Artefaktuen Txantiloiak', '../Barne Informazioa/Artefaktuen Txantiloiak/Artefaktuen Txantiloiak.pdf',
        ['2.1 - PDF', '../Barne Informazioa/Artefaktuen Txantiloiak/Artefaktuen Txantiloiak.pdf',
          ['2.1.1 - Arkitektura Koadernoa', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/architecture_notebook_tpl.pdf'],
          ['2.1.2 - Diseinuaren Eredua', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/design_tpl.pdf'],
          ['2.1.3 - Hedapen Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/rup_dplpln_tpl.pdf'],
          ['2.1.4 - Entrega Komunikazioak', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/rup_relnt_tpl.pdf'],
          ['2.1.5 - Garapen Kasua', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/development_case_tpl.pdf'],
          ['2.1.6 - Proba Kasuak', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/test_cases_tpl.pdf'],
          ['2.1.7 - Proba Script-ak', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/test_script_tpl.pdf'],
          ['2.1.8 - Glosategia', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/rup_glossary_tpl.pdf'],
          ['2.1.9 - Ikuspegia', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/vision_tpl.pdf'],
          ['2.1.10 - Betebeharren Espezifikazioa', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/systemwide_req_spec_tpl.pdf'],
          ['2.1.11 - Erabilpen Kasua', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/usecase_specification_tpl.pdf'],
          ['2.1.12 - Iterazio Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/iteration_plan_tpl.pdf'],
          ['2.1.13 - Proiektu Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/project_plan_tpl.pdf'],
          ['2.1.14 - Arrisku Zerrenda', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/risk_list_tpl.pdf'],
          ['2.1.15 - Lan Atazen Zerrenda', '../Barne Informazioa/Artefaktuen Txantiloiak/PDF/work_items_list_tpl.pdf'],
        ],
        ['2.2 - DOTX', '../Barne Informazioa/Artefaktuen Txantiloiak.pdf',
          ['2.2.1 - Arkitektura Koadernoa', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/architecture_notebook_tpl.dotx'],
          ['2.2.2 - Diseinuaren Eredua', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/A2 - Analisia eta Diseinua/design_tpl.dotx'],
          ['2.2.3 - Hedapen Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/rup_dplpln_tpl.dotx'],
          ['2.2.4 - Entrega Komunikazioak', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/rup_relnt_tpl.dotx'],
          ['2.2.5 - Garapen Kasua', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/development_case_tpl.dotx'],
          ['2.2.6 - Proba Kasuak', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/Proba/test_cases_tpl.dotx'],
          ['2.2.7 - Proba Script-ak', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/test_script_tpl.dotx'],
          ['2.2.8 - Glosategia', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/rup_glossary_tpl.dotx'],
          ['2.2.9 - Ikuspegia', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/vision_tpl.dotx'],
          ['2.2.10 - Betebeharren Espezifikazioa', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/systemwide_req_spec_tpl.dotx'],
          ['2.2.11 - Erabilpen Kasua', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/usecase_specification_tpl.dotx'],
          ['2.2.12 - Iterazio Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/iteration_plan_tpl.dotx'],
          ['2.2.13 - Proiektu Plana', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/project_plan_tpl.dotx'],
          ['2.2.14 - Arrisku Zerrenda', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/risk_list_tpl.xltx'],
          ['2.2.15 - Lan Atazen Zerrenda', '../Barne Informazioa/Artefaktuen Txantiloiak/DOTX/work_items_list_tpl.xltx'],
        ],
      ],
      ['3 - Aurreko Proiektuak', '../Barne Informazioa/Aurreko Proiektuak/Aurreko Proiektuak.pdf',
        ['3.1 - ProMeta 2021', 'https://juletx.github.io/ProMeta',
          ['3.1.1 - ProMeta Webgunea', 'https://juletx.github.io/ProMeta'],
          ['3.1.2 - ProMeta Kodea', 'https://github.com/juletx/ProMeta'],
          ['3.1.3 - ProMeta ModelEditor', 'https://juletx.github.io/ProMeta-ModelEditor'],
          ['3.1.4 - ProMeta ModelEditor Kodea', 'https://github.com/juletx/ProMeta-ModelEditor'],
          ['3.1.5 - ProMeta IO-System', 'https://live-prometa.pantheonsite.io'],
          ['3.1.6 - ProMeta IO-System Kodea', 'https://github.com/juletx/ProMeta-IO-System'],
        ],
        ['3.2 - ProWF 2020', 'https://juletx.github.io/ProWF',
          ['3.2.1 - ProWF Webgunea', 'https://juletx.github.io/ProWF'],
          ['3.2.2 - ProWF Kodea', 'https://github.com/juletx/ProWF'],
          ['3.2.3 - ProWF WorkflowEditor', 'https://github.com/juletx/ProWF-WorkflowEditor'],
          ['3.2.4 - ProWF IO-System', 'https://github.com/juletx/ProWF-IO-System'],
        ],
        ['3.3 - BETRADOK 2019', 'https://juletx.github.io/BETRADOK',
          ['3.3.1 - BETRADOK Webgunea', 'https://juletx.github.io/BETRADOK'],
          ['3.3.2 - BETRADOK Kodea', 'https://github.com/juletx/BETRADOK'],
        ],
      ],
      ['4 - Ingurunea', '../Barne Informazioa/Ingurunea/0_ingurunea.pdf',
        ['4.1 - Garapen Prozesuaren Webgunea', '../Barne Informazioa/Ingurunea/Project Lifecycle/index.html'],
        ['4.2 - Garapen Prozesua', '../Barne Informazioa/Ingurunea/Project Lifecycle.bpm'],
        ['4.3 - Garapen Kasua', '../Barne Informazioa/Ingurunea/development_case_tpl.pdf'],
        ['4.4 - Tresnak', '../Barne Informazioa/Ingurunea/tools.pdf',
          ['4.4.1 - Proiektuen Elaborazio Aplikazioa', 'https://live-prometa.pantheonsite.io/'],
          ['4.4.2 - Osagaiak', '../Barne Informazioa/Ingurunea/tools.pdf'],
        ],
        ['4.5 - Prozesuaren Planifikazioa', '../Barne Informazioa/Ingurunea/Lanaren Planifikazioa.pdf'],
        ['4.6 - Prozesuaren Erabakien Justifikazioa', '../Barne Informazioa/Ingurunea/Erabakien Justifikazioa.pdf'],
        ['4.7 - Prozesuaren Inplementazio Ideiak', '../Barne Informazioa/Ingurunea/Inplementazio Ideiak.pdf'],
      ],
      ['5 - Erremintak', '../Barne Informazioa/Ingurunea/tools.pdf',
        ['5.1 - ProMeta', 'https://github.com/juletx/ProMeta',
          ['5.1.1 - Git', 'https://git-scm.com/'],
          ['5.1.2 - GitHub', 'https://github.com/'],
          ['5.1.3 - GitHub Pages', 'https://pages.github.com/'],
          ['5.1.4 - Toggle Track', 'https://toggl.com/track/'],
        ],
        ['5.2 - ProMeta ModelEditor', 'https://github.com/juletx/ProMeta-ModelEditor',
          ['5.2.1 - Java SE', 'https://www.oracle.com/java/technologies/javase-downloads.html'],
          ['5.2.2 - Eclipse IDE', 'https://www.eclipse.org/eclipseide/'],
          ['5.2.3 - Eclipse Process Framework', 'https://projects.eclipse.org/projects/technology.epf/'],
          ['5.2.4 - EPF Methodologies', 'https://420-gel-hy.github.io/EPF/#!index.md'],
          ['5.2.5 - EPF Composer', 'https://www.eclipse.org/epf/composer_architecture/'],
          ['5.2.6 - Eclipse Modeling Framework', 'https://www.eclipse.org/modeling/emf/'],
          ['5.2.7 - Xtext', 'https://www.eclipse.org/Xtext'],
          ['5.2.8 - XSLT', 'https://www.w3schools.com/xml/xsl_intro.asp'],

        ],
        ['5.3 - ProMeta IO-System', 'https://github.com/juletx/ProMeta-IO-System',
          ['5.3.1 - Drupal', 'https://www.drupal.org'],
          ['5.3.2 - Pantheon', 'https://pantheon.io'],
          ['5.3.3 - XAMPP', 'https://www.apachefriends.org/es/index.html'],
          ['5.3.4 - MySQL', 'https://www.mysql.com/'],
        ],
      ],
      ['6 - Trebatzeko Materialak', '../Barne Informazioa/Barne Kudeaketa/Trebatzeko Materialak/Trebatzeko Materialak.pdf',
        ['6.1 - ProMeta', 'https://github.com/juletx/ProMeta',
          ['6.1.1 - Git Documentation', 'https://git-scm.com/doc'],
          ['6.1.2 - GitHub Documentation', 'https://docs.github.com/'],
          ['6.1.3 - GitHub Pages Documentation', 'https://docs.github.com/pages'],
        ],
        ['6.2 - ProMeta ModelEditor', 'https://github.com/juletx/ProMeta-ModelEditor',
          ['6.2.1 - Xtext Documentation', 'https://www.eclipse.org/Xtext/documentation/index.html'],
          ['6.2.2 - Eclipse EMF Tutorial', 'https://www.vogella.com/tutorials/EclipseEMF/article.html'],
          ['6.2.3 - Combining EMF Models with Xtext DSLs', 'https://blogs.itemis.com/en/combining-emf-models-with-xtext-dsls'],
          ['6.2.4 - XSLT Documentation', 'https://www.w3schools.com/xml/xsl_intro.asp'],
        ],
        ['6.3 - ProMeta IO-System', 'https://github.com/juletx/ProMeta-IO-System',
          ['6.3.1 - Drupal Documentation', 'https://www.drupal.org/documentation'],
          ['6.3.2 - Pantheon Documentation', 'https://pantheon.io/docs/'],
          ['6.3.3 - Curso Drupal Youtube', 'https://www.youtube.com/watch?v=FGrn7fukJfI'],
          ['6.3.4 - XAMPP Documentation', 'https://www.apachefriends.org/docs/'],
        ],
      ],
    ]
  ];