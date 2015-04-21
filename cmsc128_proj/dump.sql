--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE admin (
    emp_id character varying(15) NOT NULL,
    password character varying(50) NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: adviser; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE adviser (
    id character varying(15) NOT NULL,
    name character varying(100) NOT NULL,
    email_add character varying(50) NOT NULL,
    contact_no character varying(11) NOT NULL,
    office_no character varying(5) NOT NULL
);


ALTER TABLE public.adviser OWNER TO postgres;

--
-- Name: announcement; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE announcement (
    id integer NOT NULL,
    date date NOT NULL,
    body text NOT NULL,
    title text NOT NULL
);


ALTER TABLE public.announcement OWNER TO postgres;

--
-- Name: announcement_file; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE announcement_file (
    id integer NOT NULL,
    file_name character varying(15) NOT NULL
);


ALTER TABLE public.announcement_file OWNER TO postgres;

--
-- Name: announcement_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE announcement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.announcement_id_seq OWNER TO postgres;

--
-- Name: announcement_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE announcement_id_seq OWNED BY announcement.id;


--
-- Name: appointment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE appointment (
    stud_no character varying(10) NOT NULL,
    emp_id character varying(15) NOT NULL,
    date_sent time without time zone NOT NULL,
    appoint_date time without time zone NOT NULL,
    status character varying(10) NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.appointment OWNER TO postgres;

--
-- Name: appointment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE appointment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.appointment_id_seq OWNER TO postgres;

--
-- Name: appointment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE appointment_id_seq OWNED BY appointment.id;


--
-- Name: notification; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE notification (
    notif_body text NOT NULL,
    sender_id character varying(10) NOT NULL,
    receiver_id character varying(15) NOT NULL,
    notif_id integer NOT NULL
);


ALTER TABLE public.notification OWNER TO postgres;

--
-- Name: notification_notif_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE notification_notif_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.notification_notif_id_seq OWNER TO postgres;

--
-- Name: notification_notif_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE notification_notif_id_seq OWNED BY notification.notif_id;


--
-- Name: student; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student (
    stud_no character varying(10) NOT NULL,
    name character varying(100) NOT NULL,
    classification character varying(10) NOT NULL,
    status character varying(27) NOT NULL,
    email_add character varying(50) NOT NULL,
    contact_no character varying(11)
);


ALTER TABLE public.student OWNER TO postgres;

--
-- Name: student_status; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE student_status (
    id character varying(10) NOT NULL,
    year character varying(9) NOT NULL,
    semester character varying(6) NOT NULL,
    units_earned integer NOT NULL,
    units_registered integer NOT NULL,
    status character varying(27) NOT NULL
);


ALTER TABLE public.student_status OWNER TO postgres;

--
-- Name: subject; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE subject (
    crs_no character varying(8) NOT NULL,
    crs_title character varying(20) NOT NULL,
    section character varying(7) NOT NULL,
    start_time time without time zone NOT NULL,
    end_time time without time zone NOT NULL
);


ALTER TABLE public.subject OWNER TO postgres;

--
-- Name: user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE "user" (
    username character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    role character varying(7) NOT NULL
);


ALTER TABLE public."user" OWNER TO postgres;

--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY announcement ALTER COLUMN id SET DEFAULT nextval('announcement_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY appointment ALTER COLUMN id SET DEFAULT nextval('appointment_id_seq'::regclass);


--
-- Name: notif_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY notification ALTER COLUMN notif_id SET DEFAULT nextval('notification_notif_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: adviser; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO adviser VALUES ('10-2325323', 'Adviser_joe_doe', 'asd@examp.com', '0923425236', 'C-124');
INSERT INTO adviser VALUES ('10-235262', 'adviser_jae_doe', 'asdG@lkj.com', '09235262362', 'C-335');


--
-- Data for Name: announcement; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO announcement VALUES (9, '2015-04-11', 'asfasgasgag', 'asdasdas');
INSERT INTO announcement VALUES (10, '2015-04-07', 'asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg asdagsgasdgasdgasdg  sdg asg', 'Title3');


--
-- Data for Name: announcement_file; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: announcement_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('announcement_id_seq', 10, true);


--
-- Data for Name: appointment; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: appointment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('appointment_id_seq', 1, false);


--
-- Data for Name: notification; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: notification_notif_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('notification_notif_id_seq', 1, false);


--
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO student VALUES ('2012-12423', 'John Doe', 'Jr', 'Married', 'e@add.com', '09123124252');
INSERT INTO student VALUES ('2012-35363', 'Jane Doe', 'Jr', 'Married', 'eb@add.com', '09353473465');


--
-- Data for Name: student_status; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: subject; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "user" VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');
INSERT INTO "user" VALUES ('student', '5f4dcc3b5aa765d61d8327deb882cf99', 'student');
INSERT INTO "user" VALUES ('adviser', '5f4dcc3b5aa765d61d8327deb882cf99', 'adviser');


--
-- Name: pk_admin_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY admin
    ADD CONSTRAINT pk_admin_id PRIMARY KEY (emp_id);


--
-- Name: pk_announcement_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT pk_announcement_id PRIMARY KEY (id);


--
-- Name: pk_appoint_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY appointment
    ADD CONSTRAINT pk_appoint_id PRIMARY KEY (id);


--
-- Name: pk_crs_no; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY subject
    ADD CONSTRAINT pk_crs_no PRIMARY KEY (crs_no);


--
-- Name: pk_emp_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY adviser
    ADD CONSTRAINT pk_emp_id PRIMARY KEY (id);


--
-- Name: pk_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student_status
    ADD CONSTRAINT pk_id PRIMARY KEY (id);


--
-- Name: pk_notif_id; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY notification
    ADD CONSTRAINT pk_notif_id PRIMARY KEY (notif_id);


--
-- Name: pk_stud_no; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY student
    ADD CONSTRAINT pk_stud_no PRIMARY KEY (stud_no);


--
-- Name: pk_username; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT pk_username PRIMARY KEY (username);


--
-- Name: fk_announcement_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY announcement_file
    ADD CONSTRAINT fk_announcement_id FOREIGN KEY (id) REFERENCES announcement(id);


--
-- Name: fk_emp_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY appointment
    ADD CONSTRAINT fk_emp_id FOREIGN KEY (emp_id) REFERENCES adviser(id);


--
-- Name: fk_stud_no; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY appointment
    ADD CONSTRAINT fk_stud_no FOREIGN KEY (stud_no) REFERENCES student(stud_no);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

