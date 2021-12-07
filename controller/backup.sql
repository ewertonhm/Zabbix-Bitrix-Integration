PGDMP     )                	    y            taskcontroller #   12.8 (Ubuntu 12.8-0ubuntu0.20.04.1) #   12.8 (Ubuntu 12.8-0ubuntu0.20.04.1) [    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16385    taskcontroller    DATABASE     �   CREATE DATABASE taskcontroller WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';
    DROP DATABASE taskcontroller;
                postgres    false            �            1259    17976    api_keys    TABLE     ]   CREATE TABLE public.api_keys (
    id integer NOT NULL,
    api_key character varying(32)
);
    DROP TABLE public.api_keys;
       public         heap    postgres    false            �            1259    17974    api_keys_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_keys_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.api_keys_id_seq;
       public          postgres    false    223            �           0    0    api_keys_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.api_keys_id_seq OWNED BY public.api_keys.id;
          public          postgres    false    222            �            1259    17870    colaborador    TABLE     �   CREATE TABLE public.colaborador (
    id integer NOT NULL,
    nome character varying(90) NOT NULL,
    bitrix_id character varying(10) NOT NULL
);
    DROP TABLE public.colaborador;
       public         heap    postgres    false            �            1259    17868    colaborador_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.colaborador_id_seq;
       public          postgres    false    209            �           0    0    colaborador_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.colaborador_id_seq OWNED BY public.colaborador.id;
          public          postgres    false    208            �            1259    17896    colaborador_tecnologia    TABLE        CREATE TABLE public.colaborador_tecnologia (
    id integer NOT NULL,
    tecnologia_id integer,
    colaborador_id integer
);
 *   DROP TABLE public.colaborador_tecnologia;
       public         heap    postgres    false            �            1259    17894    colaborador_tecnologia_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_tecnologia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.colaborador_tecnologia_id_seq;
       public          postgres    false    213            �           0    0    colaborador_tecnologia_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.colaborador_tecnologia_id_seq OWNED BY public.colaborador_tecnologia.id;
          public          postgres    false    212            �            1259    17878    colaborador_unidade    TABLE     y   CREATE TABLE public.colaborador_unidade (
    id integer NOT NULL,
    unidade_id integer,
    colaborador_id integer
);
 '   DROP TABLE public.colaborador_unidade;
       public         heap    postgres    false            �            1259    17876    colaborador_unidade_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_unidade_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.colaborador_unidade_id_seq;
       public          postgres    false    211            �           0    0    colaborador_unidade_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.colaborador_unidade_id_seq OWNED BY public.colaborador_unidade.id;
          public          postgres    false    210            �            1259    17968    n3_accomplice    TABLE     �   CREATE TABLE public.n3_accomplice (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    bitrix_id character varying(10) NOT NULL
);
 !   DROP TABLE public.n3_accomplice;
       public         heap    postgres    false            �            1259    17966    n3_accomplice_id_seq    SEQUENCE     �   CREATE SEQUENCE public.n3_accomplice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.n3_accomplice_id_seq;
       public          postgres    false    221            �           0    0    n3_accomplice_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.n3_accomplice_id_seq OWNED BY public.n3_accomplice.id;
          public          postgres    false    220            �            1259    17914    task    TABLE     �   CREATE TABLE public.task (
    id integer NOT NULL,
    title character varying(90) NOT NULL,
    responsible_id integer,
    unidade_id integer,
    group_id character varying(10)
);
    DROP TABLE public.task;
       public         heap    postgres    false            �            1259    17950    task_accomplice    TABLE     q   CREATE TABLE public.task_accomplice (
    id integer NOT NULL,
    task_id integer,
    accomplice_id integer
);
 #   DROP TABLE public.task_accomplice;
       public         heap    postgres    false            �            1259    17948    task_accomplice_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_accomplice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.task_accomplice_id_seq;
       public          postgres    false    219            �           0    0    task_accomplice_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.task_accomplice_id_seq OWNED BY public.task_accomplice.id;
          public          postgres    false    218            �            1259    17932    task_auditor    TABLE     k   CREATE TABLE public.task_auditor (
    id integer NOT NULL,
    task_id integer,
    auditor_id integer
);
     DROP TABLE public.task_auditor;
       public         heap    postgres    false            �            1259    17930    task_auditor_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_auditor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.task_auditor_id_seq;
       public          postgres    false    217            �           0    0    task_auditor_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.task_auditor_id_seq OWNED BY public.task_auditor.id;
          public          postgres    false    216            �            1259    17912    task_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.task_id_seq;
       public          postgres    false    215            �           0    0    task_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.task_id_seq OWNED BY public.task.id;
          public          postgres    false    214            �            1259    17862 
   tecnologia    TABLE     b   CREATE TABLE public.tecnologia (
    id integer NOT NULL,
    tecnologia character varying(50)
);
    DROP TABLE public.tecnologia;
       public         heap    postgres    false            �            1259    17860    tecnologia_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tecnologia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.tecnologia_id_seq;
       public          postgres    false    207            �           0    0    tecnologia_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.tecnologia_id_seq OWNED BY public.tecnologia.id;
          public          postgres    false    206            �            1259    17854    unidade    TABLE     z   CREATE TABLE public.unidade (
    id integer NOT NULL,
    nome character varying(50),
    sigla character varying(10)
);
    DROP TABLE public.unidade;
       public         heap    postgres    false            �            1259    17852    unidade_id_seq    SEQUENCE     �   CREATE SEQUENCE public.unidade_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.unidade_id_seq;
       public          postgres    false    205            �           0    0    unidade_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.unidade_id_seq OWNED BY public.unidade.id;
          public          postgres    false    204            �            1259    17846    usuario    TABLE     �   CREATE TABLE public.usuario (
    id integer NOT NULL,
    email character varying(90) NOT NULL,
    senha character varying(32) NOT NULL,
    nome character varying(90) NOT NULL,
    admin integer
);
    DROP TABLE public.usuario;
       public         heap    postgres    false            �            1259    17844    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public          postgres    false    203            �           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
          public          postgres    false    202            2           2604    17979    api_keys id    DEFAULT     j   ALTER TABLE ONLY public.api_keys ALTER COLUMN id SET DEFAULT nextval('public.api_keys_id_seq'::regclass);
 :   ALTER TABLE public.api_keys ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            +           2604    17873    colaborador id    DEFAULT     p   ALTER TABLE ONLY public.colaborador ALTER COLUMN id SET DEFAULT nextval('public.colaborador_id_seq'::regclass);
 =   ALTER TABLE public.colaborador ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    208    209            -           2604    17899    colaborador_tecnologia id    DEFAULT     �   ALTER TABLE ONLY public.colaborador_tecnologia ALTER COLUMN id SET DEFAULT nextval('public.colaborador_tecnologia_id_seq'::regclass);
 H   ALTER TABLE public.colaborador_tecnologia ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            ,           2604    17881    colaborador_unidade id    DEFAULT     �   ALTER TABLE ONLY public.colaborador_unidade ALTER COLUMN id SET DEFAULT nextval('public.colaborador_unidade_id_seq'::regclass);
 E   ALTER TABLE public.colaborador_unidade ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            1           2604    17971    n3_accomplice id    DEFAULT     t   ALTER TABLE ONLY public.n3_accomplice ALTER COLUMN id SET DEFAULT nextval('public.n3_accomplice_id_seq'::regclass);
 ?   ALTER TABLE public.n3_accomplice ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            .           2604    17917    task id    DEFAULT     b   ALTER TABLE ONLY public.task ALTER COLUMN id SET DEFAULT nextval('public.task_id_seq'::regclass);
 6   ALTER TABLE public.task ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215            0           2604    17953    task_accomplice id    DEFAULT     x   ALTER TABLE ONLY public.task_accomplice ALTER COLUMN id SET DEFAULT nextval('public.task_accomplice_id_seq'::regclass);
 A   ALTER TABLE public.task_accomplice ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219            /           2604    17935    task_auditor id    DEFAULT     r   ALTER TABLE ONLY public.task_auditor ALTER COLUMN id SET DEFAULT nextval('public.task_auditor_id_seq'::regclass);
 >   ALTER TABLE public.task_auditor ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217            *           2604    17865    tecnologia id    DEFAULT     n   ALTER TABLE ONLY public.tecnologia ALTER COLUMN id SET DEFAULT nextval('public.tecnologia_id_seq'::regclass);
 <   ALTER TABLE public.tecnologia ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    207    206    207            )           2604    17857 
   unidade id    DEFAULT     h   ALTER TABLE ONLY public.unidade ALTER COLUMN id SET DEFAULT nextval('public.unidade_id_seq'::regclass);
 9   ALTER TABLE public.unidade ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    204    205    205            (           2604    17849 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    202    203            �          0    17976    api_keys 
   TABLE DATA           /   COPY public.api_keys (id, api_key) FROM stdin;
    public          postgres    false    223   ~h       �          0    17870    colaborador 
   TABLE DATA           :   COPY public.colaborador (id, nome, bitrix_id) FROM stdin;
    public          postgres    false    209   �h       �          0    17896    colaborador_tecnologia 
   TABLE DATA           S   COPY public.colaborador_tecnologia (id, tecnologia_id, colaborador_id) FROM stdin;
    public          postgres    false    213   fi       �          0    17878    colaborador_unidade 
   TABLE DATA           M   COPY public.colaborador_unidade (id, unidade_id, colaborador_id) FROM stdin;
    public          postgres    false    211   �i       �          0    17968    n3_accomplice 
   TABLE DATA           <   COPY public.n3_accomplice (id, nome, bitrix_id) FROM stdin;
    public          postgres    false    221   �i       �          0    17914    task 
   TABLE DATA           O   COPY public.task (id, title, responsible_id, unidade_id, group_id) FROM stdin;
    public          postgres    false    215   k       �          0    17950    task_accomplice 
   TABLE DATA           E   COPY public.task_accomplice (id, task_id, accomplice_id) FROM stdin;
    public          postgres    false    219   �k       �          0    17932    task_auditor 
   TABLE DATA           ?   COPY public.task_auditor (id, task_id, auditor_id) FROM stdin;
    public          postgres    false    217   �k       �          0    17862 
   tecnologia 
   TABLE DATA           4   COPY public.tecnologia (id, tecnologia) FROM stdin;
    public          postgres    false    207   �k       �          0    17854    unidade 
   TABLE DATA           2   COPY public.unidade (id, nome, sigla) FROM stdin;
    public          postgres    false    205   �l       �          0    17846    usuario 
   TABLE DATA           @   COPY public.usuario (id, email, senha, nome, admin) FROM stdin;
    public          postgres    false    203   �n       �           0    0    api_keys_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.api_keys_id_seq', 1, true);
          public          postgres    false    222            �           0    0    colaborador_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.colaborador_id_seq', 7, true);
          public          postgres    false    208            �           0    0    colaborador_tecnologia_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.colaborador_tecnologia_id_seq', 12, true);
          public          postgres    false    212            �           0    0    colaborador_unidade_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.colaborador_unidade_id_seq', 7, true);
          public          postgres    false    210            �           0    0    n3_accomplice_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.n3_accomplice_id_seq', 13, true);
          public          postgres    false    220            �           0    0    task_accomplice_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.task_accomplice_id_seq', 1, true);
          public          postgres    false    218            �           0    0    task_auditor_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.task_auditor_id_seq', 2, true);
          public          postgres    false    216            �           0    0    task_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.task_id_seq', 5, true);
          public          postgres    false    214                        0    0    tecnologia_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.tecnologia_id_seq', 13, true);
          public          postgres    false    206                       0    0    unidade_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.unidade_id_seq', 36, true);
          public          postgres    false    204                       0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 2, true);
          public          postgres    false    202            H           2606    17981    api_keys api_keys_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.api_keys
    ADD CONSTRAINT api_keys_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.api_keys DROP CONSTRAINT api_keys_pkey;
       public            postgres    false    223            :           2606    17875    colaborador colaborador_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.colaborador
    ADD CONSTRAINT colaborador_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.colaborador DROP CONSTRAINT colaborador_pkey;
       public            postgres    false    209            >           2606    17901 2   colaborador_tecnologia colaborador_tecnologia_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_pkey;
       public            postgres    false    213            <           2606    17883 ,   colaborador_unidade colaborador_unidade_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_pkey;
       public            postgres    false    211            F           2606    17973     n3_accomplice n3_accomplice_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.n3_accomplice
    ADD CONSTRAINT n3_accomplice_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.n3_accomplice DROP CONSTRAINT n3_accomplice_pkey;
       public            postgres    false    221            D           2606    17955 $   task_accomplice task_accomplice_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_pkey;
       public            postgres    false    219            B           2606    17937    task_auditor task_auditor_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_pkey;
       public            postgres    false    217            @           2606    17919    task task_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.task DROP CONSTRAINT task_pkey;
       public            postgres    false    215            8           2606    17867    tecnologia tecnologia_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.tecnologia
    ADD CONSTRAINT tecnologia_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.tecnologia DROP CONSTRAINT tecnologia_pkey;
       public            postgres    false    207            6           2606    17859    unidade unidade_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.unidade
    ADD CONSTRAINT unidade_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.unidade DROP CONSTRAINT unidade_pkey;
       public            postgres    false    205            4           2606    17851    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public            postgres    false    203            L           2606    17907 A   colaborador_tecnologia colaborador_tecnologia_colaborador_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_colaborador_id_fkey FOREIGN KEY (colaborador_id) REFERENCES public.colaborador(id);
 k   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_colaborador_id_fkey;
       public          postgres    false    209    2874    213            K           2606    17902 @   colaborador_tecnologia colaborador_tecnologia_tecnologia_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_tecnologia_id_fkey FOREIGN KEY (tecnologia_id) REFERENCES public.tecnologia(id);
 j   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_tecnologia_id_fkey;
       public          postgres    false    207    213    2872            J           2606    17889 ;   colaborador_unidade colaborador_unidade_colaborador_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_colaborador_id_fkey FOREIGN KEY (colaborador_id) REFERENCES public.colaborador(id);
 e   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_colaborador_id_fkey;
       public          postgres    false    2874    209    211            I           2606    17884 7   colaborador_unidade colaborador_unidade_unidade_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_unidade_id_fkey FOREIGN KEY (unidade_id) REFERENCES public.unidade(id);
 a   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_unidade_id_fkey;
       public          postgres    false    2870    205    211            R           2606    17961 2   task_accomplice task_accomplice_accomplice_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_accomplice_id_fkey FOREIGN KEY (accomplice_id) REFERENCES public.colaborador(id);
 \   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_accomplice_id_fkey;
       public          postgres    false    219    2874    209            Q           2606    17956 ,   task_accomplice task_accomplice_task_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_task_id_fkey FOREIGN KEY (task_id) REFERENCES public.task(id);
 V   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_task_id_fkey;
       public          postgres    false    2880    215    219            P           2606    17943 )   task_auditor task_auditor_auditor_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_auditor_id_fkey FOREIGN KEY (auditor_id) REFERENCES public.colaborador(id);
 S   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_auditor_id_fkey;
       public          postgres    false    217    2874    209            O           2606    17938 &   task_auditor task_auditor_task_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_task_id_fkey FOREIGN KEY (task_id) REFERENCES public.task(id);
 P   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_task_id_fkey;
       public          postgres    false    217    2880    215            M           2606    17920    task task_responsible_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_responsible_id_fkey FOREIGN KEY (responsible_id) REFERENCES public.colaborador(id);
 G   ALTER TABLE ONLY public.task DROP CONSTRAINT task_responsible_id_fkey;
       public          postgres    false    215    2874    209            N           2606    17925    task task_unidade_id_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_unidade_id_fkey FOREIGN KEY (unidade_id) REFERENCES public.unidade(id);
 C   ALTER TABLE ONLY public.task DROP CONSTRAINT task_unidade_id_fkey;
       public          postgres    false    215    205    2870            �   0   x�3�423J�007H1O1145OIK604�0M3N220H22����� ��	      �   �   x�ʱ�0����)�	�P�:qa2�8����MKZ��-���1����7g�x��R�k�G��7�3��G�
Fv���$Ӎ%CU���1�	�ʲR��Tם�����3�ށ:j��q�)� a*�Q��xt��c�^>�$е���\�3�      �   =   x����P���0����.�?�P�J���ē�C/�ެh�m�#��$o��?��⽀��	�      �   0   x��� 0�wn�J��t�9*�qȥ��I��+�.��5���w����      �     x�=��N�0E�㯘/@u�4���$�T)6l�dHFql�~=���ޣsu���%������n� Mը
��->��_%��?R�e`�r�/��t4F�%ip�c�����c'�U�)�9̌{�'.i�V���Ǖj��<�c�?���nT-�A<��D<
��u�NmFm���!���؍d'��e�^�9w��F����j���@�x���,��UI冇>S�=>o�%�Zk��]��ߵ��HP�VF�=(�~F/e�      �   �   x�3�t�Q�U��M-�OI2�<����7�x�sr�r�sq:���T��fV)8攥9A��d�s�p�UcU喙T��iSd�U�g^P�)L�)��o~^fI~Qbnj^I>�9��X&F��� u/*      �      x�3�4�4����� �Y      �      x�3�4�4�2�4�1z\\\ y      �   �   x�5�;�0D��S�|��>)��A��p�J�W���u8#@����#@��Wb�aI�Jc����d� mq���5l*���krv�q
Y*�^�(5Y����8�����bۊCa�ȕ��.���S����_�.����:^2�      �   �  x�]R���@�g��O��o�� g6K�4^����[l�ېQ�Tץ��e�E��3��|?�.k��{�i�eu6��A:�O�P��ti��\�Q�=��ő. ��>[]^+�� ��I�� ��\��N6�8y����� e�c�fO��'�r����v�Y��eU ?�ܱչ��:��]�����O�}�Ì�9ӎ ��Pv�h��ۃYE;m+��/�CX�տMa�;�0?����a����lr�.?��pG�>��d�Pշ��t�ׅ�iR`���s���U�j��	z,V,�.�������Wu�����#'g�x�6�+sR�d
$���Z��X/�BR�0���<����a*��l����^+}��	��G�R���s����h�ʔu:���F[~$Xo�����㛦� }���j�Go��/��`�3�-�6���g��l��-�U�,��t���? ��l
ݨɘQ��)��:+c�a��f����w�߷      �      x�m�=�0@��9L����� �`1��F��H�z}*X���,����6�`�ʄ��ҙxoU�kg]�E?:8o�'2>SvA�11��Xĸ����a�<���K���P��Ŝ�Iю%�8����O鮕R$�2�     