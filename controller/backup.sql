PGDMP     -                    y            taskcontroller    10.17    10.17 _    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    16384    taskcontroller    DATABASE     �   CREATE DATABASE taskcontroller WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';
    DROP DATABASE taskcontroller;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12286    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16517    api_keys    TABLE     ]   CREATE TABLE public.api_keys (
    id integer NOT NULL,
    api_key character varying(32)
);
    DROP TABLE public.api_keys;
       public         postgres    false    3            �            1259    16515    api_keys_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_keys_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.api_keys_id_seq;
       public       postgres    false    217    3            �           0    0    api_keys_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.api_keys_id_seq OWNED BY public.api_keys.id;
            public       postgres    false    216            �            1259    16411    colaborador    TABLE     �   CREATE TABLE public.colaborador (
    id integer NOT NULL,
    nome character varying(90) NOT NULL,
    bitrix_id character varying(10) NOT NULL
);
    DROP TABLE public.colaborador;
       public         postgres    false    3            �            1259    16409    colaborador_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.colaborador_id_seq;
       public       postgres    false    3    203            �           0    0    colaborador_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.colaborador_id_seq OWNED BY public.colaborador.id;
            public       postgres    false    202            �            1259    16437    colaborador_tecnologia    TABLE        CREATE TABLE public.colaborador_tecnologia (
    id integer NOT NULL,
    tecnologia_id integer,
    colaborador_id integer
);
 *   DROP TABLE public.colaborador_tecnologia;
       public         postgres    false    3            �            1259    16435    colaborador_tecnologia_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_tecnologia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.colaborador_tecnologia_id_seq;
       public       postgres    false    3    207            �           0    0    colaborador_tecnologia_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.colaborador_tecnologia_id_seq OWNED BY public.colaborador_tecnologia.id;
            public       postgres    false    206            �            1259    16419    colaborador_unidade    TABLE     y   CREATE TABLE public.colaborador_unidade (
    id integer NOT NULL,
    unidade_id integer,
    colaborador_id integer
);
 '   DROP TABLE public.colaborador_unidade;
       public         postgres    false    3            �            1259    16417    colaborador_unidade_id_seq    SEQUENCE     �   CREATE SEQUENCE public.colaborador_unidade_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.colaborador_unidade_id_seq;
       public       postgres    false    3    205            �           0    0    colaborador_unidade_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.colaborador_unidade_id_seq OWNED BY public.colaborador_unidade.id;
            public       postgres    false    204            �            1259    16509    n3_accomplice    TABLE     �   CREATE TABLE public.n3_accomplice (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    bitrix_id character varying(10) NOT NULL
);
 !   DROP TABLE public.n3_accomplice;
       public         postgres    false    3            �            1259    16507    n3_accomplice_id_seq    SEQUENCE     �   CREATE SEQUENCE public.n3_accomplice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.n3_accomplice_id_seq;
       public       postgres    false    3    215            �           0    0    n3_accomplice_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.n3_accomplice_id_seq OWNED BY public.n3_accomplice.id;
            public       postgres    false    214            �            1259    16455    task    TABLE     �   CREATE TABLE public.task (
    id integer NOT NULL,
    title character varying(90) NOT NULL,
    responsible_id integer,
    unidade_id integer,
    group_id character varying(10)
);
    DROP TABLE public.task;
       public         postgres    false    3            �            1259    16491    task_accomplice    TABLE     q   CREATE TABLE public.task_accomplice (
    id integer NOT NULL,
    task_id integer,
    accomplice_id integer
);
 #   DROP TABLE public.task_accomplice;
       public         postgres    false    3            �            1259    16489    task_accomplice_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_accomplice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.task_accomplice_id_seq;
       public       postgres    false    3    213            �           0    0    task_accomplice_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.task_accomplice_id_seq OWNED BY public.task_accomplice.id;
            public       postgres    false    212            �            1259    16473    task_auditor    TABLE     k   CREATE TABLE public.task_auditor (
    id integer NOT NULL,
    task_id integer,
    auditor_id integer
);
     DROP TABLE public.task_auditor;
       public         postgres    false    3            �            1259    16471    task_auditor_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_auditor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.task_auditor_id_seq;
       public       postgres    false    211    3            �           0    0    task_auditor_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.task_auditor_id_seq OWNED BY public.task_auditor.id;
            public       postgres    false    210            �            1259    16453    task_id_seq    SEQUENCE     �   CREATE SEQUENCE public.task_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.task_id_seq;
       public       postgres    false    3    209            �           0    0    task_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.task_id_seq OWNED BY public.task.id;
            public       postgres    false    208            �            1259    16403 
   tecnologia    TABLE     b   CREATE TABLE public.tecnologia (
    id integer NOT NULL,
    tecnologia character varying(50)
);
    DROP TABLE public.tecnologia;
       public         postgres    false    3            �            1259    16401    tecnologia_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tecnologia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.tecnologia_id_seq;
       public       postgres    false    3    201            �           0    0    tecnologia_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.tecnologia_id_seq OWNED BY public.tecnologia.id;
            public       postgres    false    200            �            1259    16395    unidade    TABLE     z   CREATE TABLE public.unidade (
    id integer NOT NULL,
    nome character varying(50),
    sigla character varying(10)
);
    DROP TABLE public.unidade;
       public         postgres    false    3            �            1259    16393    unidade_id_seq    SEQUENCE     �   CREATE SEQUENCE public.unidade_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.unidade_id_seq;
       public       postgres    false    199    3            �           0    0    unidade_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.unidade_id_seq OWNED BY public.unidade.id;
            public       postgres    false    198            �            1259    16387    usuario    TABLE     �   CREATE TABLE public.usuario (
    id integer NOT NULL,
    email character varying(90) NOT NULL,
    senha character varying(32) NOT NULL,
    nome character varying(90) NOT NULL,
    admin integer
);
    DROP TABLE public.usuario;
       public         postgres    false    3            �            1259    16385    usuario_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.usuario_id_seq;
       public       postgres    false    197    3            �           0    0    usuario_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;
            public       postgres    false    196            6           2604    16520    api_keys id    DEFAULT     j   ALTER TABLE ONLY public.api_keys ALTER COLUMN id SET DEFAULT nextval('public.api_keys_id_seq'::regclass);
 :   ALTER TABLE public.api_keys ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    217    216    217            /           2604    16414    colaborador id    DEFAULT     p   ALTER TABLE ONLY public.colaborador ALTER COLUMN id SET DEFAULT nextval('public.colaborador_id_seq'::regclass);
 =   ALTER TABLE public.colaborador ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    202    203            1           2604    16440    colaborador_tecnologia id    DEFAULT     �   ALTER TABLE ONLY public.colaborador_tecnologia ALTER COLUMN id SET DEFAULT nextval('public.colaborador_tecnologia_id_seq'::regclass);
 H   ALTER TABLE public.colaborador_tecnologia ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    207    207            0           2604    16422    colaborador_unidade id    DEFAULT     �   ALTER TABLE ONLY public.colaborador_unidade ALTER COLUMN id SET DEFAULT nextval('public.colaborador_unidade_id_seq'::regclass);
 E   ALTER TABLE public.colaborador_unidade ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    204    205            5           2604    16512    n3_accomplice id    DEFAULT     t   ALTER TABLE ONLY public.n3_accomplice ALTER COLUMN id SET DEFAULT nextval('public.n3_accomplice_id_seq'::regclass);
 ?   ALTER TABLE public.n3_accomplice ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    215    214    215            2           2604    16458    task id    DEFAULT     b   ALTER TABLE ONLY public.task ALTER COLUMN id SET DEFAULT nextval('public.task_id_seq'::regclass);
 6   ALTER TABLE public.task ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    209    209            4           2604    16494    task_accomplice id    DEFAULT     x   ALTER TABLE ONLY public.task_accomplice ALTER COLUMN id SET DEFAULT nextval('public.task_accomplice_id_seq'::regclass);
 A   ALTER TABLE public.task_accomplice ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    212    213    213            3           2604    16476    task_auditor id    DEFAULT     r   ALTER TABLE ONLY public.task_auditor ALTER COLUMN id SET DEFAULT nextval('public.task_auditor_id_seq'::regclass);
 >   ALTER TABLE public.task_auditor ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    210    211    211            .           2604    16406    tecnologia id    DEFAULT     n   ALTER TABLE ONLY public.tecnologia ALTER COLUMN id SET DEFAULT nextval('public.tecnologia_id_seq'::regclass);
 <   ALTER TABLE public.tecnologia ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200    201            -           2604    16398 
   unidade id    DEFAULT     h   ALTER TABLE ONLY public.unidade ALTER COLUMN id SET DEFAULT nextval('public.unidade_id_seq'::regclass);
 9   ALTER TABLE public.unidade ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199            ,           2604    16390 
   usuario id    DEFAULT     h   ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);
 9   ALTER TABLE public.usuario ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            �          0    16517    api_keys 
   TABLE DATA               /   COPY public.api_keys (id, api_key) FROM stdin;
    public       postgres    false    217   �i       �          0    16411    colaborador 
   TABLE DATA               :   COPY public.colaborador (id, nome, bitrix_id) FROM stdin;
    public       postgres    false    203   �i       �          0    16437    colaborador_tecnologia 
   TABLE DATA               S   COPY public.colaborador_tecnologia (id, tecnologia_id, colaborador_id) FROM stdin;
    public       postgres    false    207   �o       �          0    16419    colaborador_unidade 
   TABLE DATA               M   COPY public.colaborador_unidade (id, unidade_id, colaborador_id) FROM stdin;
    public       postgres    false    205   vr       �          0    16509    n3_accomplice 
   TABLE DATA               <   COPY public.n3_accomplice (id, nome, bitrix_id) FROM stdin;
    public       postgres    false    215   Ot       �          0    16455    task 
   TABLE DATA               O   COPY public.task (id, title, responsible_id, unidade_id, group_id) FROM stdin;
    public       postgres    false    209   tu       �          0    16491    task_accomplice 
   TABLE DATA               E   COPY public.task_accomplice (id, task_id, accomplice_id) FROM stdin;
    public       postgres    false    213   �x       �          0    16473    task_auditor 
   TABLE DATA               ?   COPY public.task_auditor (id, task_id, auditor_id) FROM stdin;
    public       postgres    false    211   �y       �          0    16403 
   tecnologia 
   TABLE DATA               4   COPY public.tecnologia (id, tecnologia) FROM stdin;
    public       postgres    false    201   0z       �          0    16395    unidade 
   TABLE DATA               2   COPY public.unidade (id, nome, sigla) FROM stdin;
    public       postgres    false    199   �z       �          0    16387    usuario 
   TABLE DATA               @   COPY public.usuario (id, email, senha, nome, admin) FROM stdin;
    public       postgres    false    197   �|       �           0    0    api_keys_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.api_keys_id_seq', 1, true);
            public       postgres    false    216            �           0    0    colaborador_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.colaborador_id_seq', 95, true);
            public       postgres    false    202            �           0    0    colaborador_tecnologia_id_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.colaborador_tecnologia_id_seq', 190, true);
            public       postgres    false    206            �           0    0    colaborador_unidade_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.colaborador_unidade_id_seq', 120, true);
            public       postgres    false    204            �           0    0    n3_accomplice_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.n3_accomplice_id_seq', 13, true);
            public       postgres    false    214            �           0    0    task_accomplice_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.task_accomplice_id_seq', 50, true);
            public       postgres    false    212            �           0    0    task_auditor_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.task_auditor_id_seq', 18, true);
            public       postgres    false    210             	           0    0    task_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.task_id_seq', 62, true);
            public       postgres    false    208            	           0    0    tecnologia_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.tecnologia_id_seq', 13, true);
            public       postgres    false    200            	           0    0    unidade_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.unidade_id_seq', 36, true);
            public       postgres    false    198            	           0    0    usuario_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.usuario_id_seq', 3, true);
            public       postgres    false    196            L           2606    16522    api_keys api_keys_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.api_keys
    ADD CONSTRAINT api_keys_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.api_keys DROP CONSTRAINT api_keys_pkey;
       public         postgres    false    217            >           2606    16416    colaborador colaborador_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.colaborador
    ADD CONSTRAINT colaborador_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.colaborador DROP CONSTRAINT colaborador_pkey;
       public         postgres    false    203            B           2606    16442 2   colaborador_tecnologia colaborador_tecnologia_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_pkey;
       public         postgres    false    207            @           2606    16424 ,   colaborador_unidade colaborador_unidade_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_pkey;
       public         postgres    false    205            J           2606    16514     n3_accomplice n3_accomplice_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.n3_accomplice
    ADD CONSTRAINT n3_accomplice_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.n3_accomplice DROP CONSTRAINT n3_accomplice_pkey;
       public         postgres    false    215            H           2606    16496 $   task_accomplice task_accomplice_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_pkey;
       public         postgres    false    213            F           2606    16478    task_auditor task_auditor_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_pkey;
       public         postgres    false    211            D           2606    16460    task task_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.task DROP CONSTRAINT task_pkey;
       public         postgres    false    209            <           2606    16408    tecnologia tecnologia_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.tecnologia
    ADD CONSTRAINT tecnologia_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.tecnologia DROP CONSTRAINT tecnologia_pkey;
       public         postgres    false    201            :           2606    16400    unidade unidade_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.unidade
    ADD CONSTRAINT unidade_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.unidade DROP CONSTRAINT unidade_pkey;
       public         postgres    false    199            8           2606    16392    usuario usuario_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.usuario DROP CONSTRAINT usuario_pkey;
       public         postgres    false    197            P           2606    16448 A   colaborador_tecnologia colaborador_tecnologia_colaborador_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_colaborador_id_fkey FOREIGN KEY (colaborador_id) REFERENCES public.colaborador(id);
 k   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_colaborador_id_fkey;
       public       postgres    false    2110    203    207            O           2606    16443 @   colaborador_tecnologia colaborador_tecnologia_tecnologia_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_tecnologia
    ADD CONSTRAINT colaborador_tecnologia_tecnologia_id_fkey FOREIGN KEY (tecnologia_id) REFERENCES public.tecnologia(id);
 j   ALTER TABLE ONLY public.colaborador_tecnologia DROP CONSTRAINT colaborador_tecnologia_tecnologia_id_fkey;
       public       postgres    false    201    207    2108            N           2606    16430 ;   colaborador_unidade colaborador_unidade_colaborador_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_colaborador_id_fkey FOREIGN KEY (colaborador_id) REFERENCES public.colaborador(id);
 e   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_colaborador_id_fkey;
       public       postgres    false    203    205    2110            M           2606    16425 7   colaborador_unidade colaborador_unidade_unidade_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaborador_unidade
    ADD CONSTRAINT colaborador_unidade_unidade_id_fkey FOREIGN KEY (unidade_id) REFERENCES public.unidade(id);
 a   ALTER TABLE ONLY public.colaborador_unidade DROP CONSTRAINT colaborador_unidade_unidade_id_fkey;
       public       postgres    false    205    199    2106            V           2606    16502 2   task_accomplice task_accomplice_accomplice_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_accomplice_id_fkey FOREIGN KEY (accomplice_id) REFERENCES public.colaborador(id);
 \   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_accomplice_id_fkey;
       public       postgres    false    203    2110    213            U           2606    16497 ,   task_accomplice task_accomplice_task_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_accomplice
    ADD CONSTRAINT task_accomplice_task_id_fkey FOREIGN KEY (task_id) REFERENCES public.task(id);
 V   ALTER TABLE ONLY public.task_accomplice DROP CONSTRAINT task_accomplice_task_id_fkey;
       public       postgres    false    213    209    2116            T           2606    16484 )   task_auditor task_auditor_auditor_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_auditor_id_fkey FOREIGN KEY (auditor_id) REFERENCES public.colaborador(id);
 S   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_auditor_id_fkey;
       public       postgres    false    211    2110    203            S           2606    16479 &   task_auditor task_auditor_task_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task_auditor
    ADD CONSTRAINT task_auditor_task_id_fkey FOREIGN KEY (task_id) REFERENCES public.task(id);
 P   ALTER TABLE ONLY public.task_auditor DROP CONSTRAINT task_auditor_task_id_fkey;
       public       postgres    false    2116    209    211            Q           2606    16461    task task_responsible_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_responsible_id_fkey FOREIGN KEY (responsible_id) REFERENCES public.colaborador(id);
 G   ALTER TABLE ONLY public.task DROP CONSTRAINT task_responsible_id_fkey;
       public       postgres    false    203    209    2110            R           2606    16466    task task_unidade_id_fkey    FK CONSTRAINT     }   ALTER TABLE ONLY public.task
    ADD CONSTRAINT task_unidade_id_fkey FOREIGN KEY (unidade_id) REFERENCES public.unidade(id);
 C   ALTER TABLE ONLY public.task DROP CONSTRAINT task_unidade_id_fkey;
       public       postgres    false    209    2106    199            �   0   x�3�423J�007H1O1145OIK604�0M3N220H22����� ��	      �   �  x�MVɎ�8=�B_X�����-�K��L�KYfd�2�P�g��f0� �9���W����H�X|[)���}rα}2���F*�Ret�.&g����۞Ҭ2J�ٲ>yk}t�F�܇ȮO�x�����;��pY�*���W�y��T�Fz�v��_�,�Zt�5v!��1��Q6K�*�|]?84z�I�W�g�g���-����/:Ki����q�y���Q�ύQ�.�;�%W6z�ː�#O�Ϊ�ViJ�g���u�md��TiFg~qe�z�Bu�U��nt/����6��T�9����{�D?�_��}�v�E�mP����(�p�7�X/�1,a�E�MxAcX/���	'W�R�V+z䯌�<�etmHކ��~(-Rl�GD��	Tյ�f8v����������^�܆U'p�FeP�J(�x���GҳL�Lӕ���&�\���]�t��,�{� ��=ia*3"+�n�P������>9������\��e���x��Or�o@��[��ru#mW�7�Tr��;���6��iG�uǛ��8>5�Vzv\~=,K�R�.w�JH.�_�.r�����9w=n!׸��@����޹e�!�vыm���kYE-C׮�J6���uAW�}����pMnF�B���%�u� ��K�ÂHϱY�Iװ�]��r����uM�X����å��*��5/�Xb�7t����5��~�|�-�ePyvR�|��t��_�x,<�8���&x*�<�±�@!�JN&(�~���[�,ƞ�V�Hx�v�CMX.��7/�kQ��.���=��-C�*���;��[�]�Ũ+����̌��v�@���-A� l$�6툞��q���O�2�vv:��u;Nn��7H���s���mC|N��g��E��-����S�s��<+����yͩ������@9���ҁ5xT�����8��'ތ��ȐZ���O�
j��HW��t�t�)��Nx�A�*f����ڀ��/&e�����W�>��[�`�Z��o����V�
M��Ή���dɈ��/�f~̪[n<F�TDk�}rz�nx���9�I����a�#%]�����C���r')q��
:,�7%�aI�-Yӵ��&,���]�^��i�	!��:�T-0��_&Ա�y@�`���5�Ż�L�d��R�t�u���� ��\�,{/�&K������`t���0xNE�)&4@}%p��20N���B.c ޲�mJ����������am	��*ĲD���A�� ����i���,�B�J���1�ތ�Q��8Q0\� �S��Ǹ�$wa5-U�'K}��2&b�f+_���eYF���s^��������ȇ�9����1C��)~�/0P����t��GF���v�����ѝ� �!�f=%PZ�a��L�)b������U��q ;z� ʇc� �v��:l��1�e�T���-�q��4����N�\�_��C��;�c�"��@_�(���      �   |  x��ۍ�0��`������U5���x�E�t��7���?k�g�o�s��p��r��q����S������񪙁���~����ϭ���2uzޫ/���9z<�z�>�)@�6kȥ
�J�V�T����h�v���;5Ç6�G����߫>�b���ժ����[-�T�T��������Q�<�zU�:C�O�^t[o_��W�^U��k[o?��W߭>����~~~u~^�:����O�o�:���^G>U>��7F]�T�T�1f]�T���g�����C���%��K�<4y�^����;^=�U���<��؁�8�G<��L��,��1c�_il�;�i�2�^Ή��1v3�v΅��164�L�ق{��6a�uv!&��Z��_]�E9]�|�9F���]f͐9F���9F���C��cd^���*4�y�<e^��I�[�$�Tvi}T�i0�	��7e�η��!���J�o��Na|���6�lW��Z��C4��<ٮ�.2Y*���9��X\ǭw˙��q�m3w��򒶭�z�_R�OV�OV�S����d������O1>��d�S���t��uJ1N�Rq�*&o`_��?�Mx�\����n=����l�&��f������N�^      �   �  x�-�[��0C��b�J��e���k<#�⨤���8��ma>,׎��.ʼYx[b,��៵�w뱣w�e��s۬�m��6����s�����6�tt��0^�u���)u�a�sq�:�C���<�_K.Ċ�v[� Rk��]?�qWG�XF@}��>A�����]��]�f�^A�`pi��n/ć;k5W�� WĂ?��W�"�!($��E#��'7�<d/�9G>�Aq����w� Q���B]A�R0�<T/䇢rX:�	��ih00T.�D���T�l��s�·�p}�8�	��s�,Wad�#����a��F��)���`_<	v�I�p	v�I�O�=x�o����q�|!�B��+*R�2�c��z9a�h��Pq�6������Z�����)bCC��=�(G	f����u٣MWm��K�������      �     x�=��j�0�ϫ��'(���1i~
M!h.�l���ؖڵ��<}(���|�XX��tn��Y�**S�����O�U��Eb�#f�2�,Wi�DQ��r��aO�g�C�"]��0E�3%��ȸ��眖f~|V{\�6��g�x[������J�c�	�Bc���i�̙�Yc.��|!�ꎆ�eegpL5Mx�;�)�Ų������(#���+c���wM"m>k��ʢ�����U��7Y�pO��ǚ%l4�p7�C����c�/�m�      �   L  x����r�8���`�3� ��$ǎ2v��n 	+�C
D*�ty�$E&E�ti�b{@���%w���8�� 	�q�2�+�w"�`��(�7Z���l-�w��rU��6�{�]�&�����|1{{>{s9ŵf!�	O3Q~�RyS�[*-��'k��M��UЇ�đLD&�X��FU>6p�[�l��`��#����5!jF��(��x��f�5�����Z��̑�`@�`����يd0��X���A[҇�Z��[+oQ���N($���0�6��� [��a]�OA@�X�I���e�7� A��$�+�՞/�iĺH�*�R�b�%@���j��G^�<-3�M3C�0n�[��,ݪ�_m���ZF�Y/�_{���4�{b��>����zEx�5��� K!�(�@�.�VSQ���(���L��^f�+4ATfG���{��P���:r]N�褣��L�o���cnj�1�.�'o�[08�������Hh]�&`��$ܻ�s�S�)f���)� ݑfí�	�֢�)l��)c	��;1+�v��QW�IX�X�ߔ71�����=�`�ׇLM1Kᐼ/�n���T�~��m#10;C~��kw���K��`��j%�B��3�Z'����b���Ý�-��0������\I�;1���&F�FP{,V�
1.W$�{�R0�wE2x�I�	klM�xWw���h���//R�]j!�᫂�Q|����s�0;4��BDvT�Q��>h{�N��o��6�A��)F{y3�] �%v��O��i��ߜ�z��{�K�ZGp�U���&&�^�M�2_me�����Ë��� �:K�      �   �   x��ɕ�0����3�P.?�8��Ŕ@�B:c\�37f��������px��h߃������Cx�i� )����{�*\Nu]���҆�C������(���:���HJR5}�߃��'I��M���8R�a�B����M��Gר9)ӡ�L���T�(-��(����f�������Zs=jNtQs�%񠇚S�c}h�	��H�]�?�      �   c   x����0��T1�h���:�΋$PƅS��`-1�P�X�s9I��E&�d]�!���&U�#���p�7u�[ԤZ���S-:YS�O����      �   �   x�5�;�0D��S�|��>)��A��p�J�W���u8#@����#@��Wb�aI�Jc����d� mq���5l*���krv�q
Y*�^�(5Y����8�����bۊCa�ȕ��.���S����_�.����:^2�      �   �  x�]Q���@�g�B_`Њg(���̫���*'ڂ�Zn%Q���;.�.s��gz�����hMV�婦NXVc)?$���rU�ZmI罱���ܢ��U�K�,��@�L��9�u~���"�>�*�+�l��T���X��%��M;o�r��.�P���+�4ʜ�8q���
�.7s��,�G]�;��ԯ���j����%�����CЮy0#k.�'�W�Pv��$A�����VܟLև��'�5�B?Dw av2%�~p������4���;���s���cU���'�E"Ӹ��"�p���Ug�j.F�	
�s:���J�8~vU��h�����B�-�ksV֤
$G!����^6sC��������c������Rek��z����c���^Q���c����d�J�u:L`m�-;lv�=�>�9�d���q�T8�Fx��ls�p���K�V��e�-���a�S�-�.��g�Ʋ��Ɩ��I���      �   �   x���;� @�W�
@@��]C�4Ox�L&���Ø6U�{'�cYs�3��N_���|xoHm��X�����1i��{�Ai �Ъ#�/Cx#DHtD���sR^��g5`��U�(�f@r�@{���^��q�F:����coa�2���O�4��Q�     