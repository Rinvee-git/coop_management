import { Link } from 'react-router';
import { ArrowRight, Shield, TrendingUp, Users, Heart, Building2, Calculator, CreditCard, ChevronDown } from 'lucide-react';
import { Button } from '../components/ui/button';
import { Card, CardContent } from '../components/ui/card';
import { useEffect, useRef, useState } from 'react';

/* ─── Intersection Observer Hook ─────────────────────────────── */
function useInView(options = {}) {
  const ref = useRef(null);
  const [inView, setInView] = useState(false);
  useEffect(() => {
    const el = ref.current;
    if (!el) return;
    const obs = new IntersectionObserver(([entry]) => {
      if (entry.isIntersecting) { setInView(true); obs.disconnect(); }
    }, { threshold: 0.15, ...options });
    obs.observe(el);
    return () => obs.disconnect();
  }, []);
  return [ref, inView];
}

/* ─── Counter animation ───────────────────────────────────────── */
function AnimatedCounter({ value, inView }) {
  const [display, setDisplay] = useState('0');
  useEffect(() => {
    if (!inView) return;
    const numeric = parseFloat(value.replace(/[^0-9.]/g, ''));
    const suffix = value.replace(/[0-9.]/g, '');
    const duration = 1600;
    const start = performance.now();
    const tick = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const ease = 1 - Math.pow(1 - progress, 3);
      setDisplay(
        (numeric < 100 ? Math.round(ease * numeric) : Math.round(ease * numeric)) + suffix
      );
      if (progress < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  }, [inView, value]);
  return <span>{display}</span>;
}

/* ─── Floating particle ───────────────────────────────────────── */
function Particles() {
  const particles = Array.from({ length: 18 }, (_, i) => ({
    id: i,
    size: Math.random() * 4 + 2,
    x: Math.random() * 100,
    delay: Math.random() * 8,
    duration: Math.random() * 10 + 12,
    opacity: Math.random() * 0.4 + 0.1,
  }));
  return (
    <div className="absolute inset-0 overflow-hidden pointer-events-none">
      {particles.map(p => (
        <div
          key={p.id}
          className="absolute rounded-full bg-white animate-float"
          style={{
            width: p.size, height: p.size,
            left: `${p.x}%`, bottom: '-10px',
            opacity: p.opacity,
            animation: `floatUp ${p.duration}s ${p.delay}s infinite linear`,
          }}
        />
      ))}
    </div>
  );
}

export function Home() {
  const [heroVisible, setHeroVisible] = useState(false);
  const [statsRef, statsInView] = useInView();
  const [featuresRef, featuresInView] = useInView();
  const [servicesRef, servicesInView] = useInView();
  const [ctaRef, ctaInView] = useInView();

  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const features = [
    { icon: Shield, title: 'Secure & Trusted', description: 'Your financial security is our top priority with industry-leading protection.' },
    { icon: TrendingUp, title: 'Competitive Rates', description: 'Enjoy attractive interest rates on loans and deposits designed for members.' },
    { icon: Users, title: 'Member-Focused', description: 'Built by the community, for the community. Your success is our mission.' },
    { icon: Heart, title: 'Community Impact', description: 'Together we grow stronger, supporting local development and prosperity.' },
  ];

  const services = [
    { icon: CreditCard, title: 'Flexible Loans', description: 'Personal, business, and emergency loans with flexible terms.', link: '/products/loans', gradient: 'from-blue-500 to-blue-600', accent: '#3b82f6' },
    { icon: Building2, title: 'Savings & Deposits', description: 'Grow your wealth with competitive savings rates.', link: '/products/deposits', gradient: 'from-indigo-500 to-indigo-600', accent: '#6366f1' },
    { icon: Calculator, title: 'Loan Calculator', description: 'Calculate your monthly payments and plan ahead.', link: '/calculator', gradient: 'from-purple-500 to-purple-600', accent: '#8b5cf6' },
    { icon: Users, title: 'Become a Member', description: 'Join our growing community and unlock benefits.', link: '/membership/apply', gradient: 'from-pink-500 to-pink-600', accent: '#ec4899' },
  ];

  const stats = [
    { value: '10K+', label: 'Active Members' },
    { value: '50M+', label: 'Total Assets' },
    { value: '25+', label: 'Years of Service' },
    { value: '99%', label: 'Member Satisfaction' },
  ];

  return (
    <>
      <style>{`
        @keyframes floatUp {
          0%   { transform: translateY(0) scale(1); opacity: var(--op, 0.2); }
          50%  { opacity: calc(var(--op, 0.2) * 1.5); }
          100% { transform: translateY(-100vh) scale(0.5); opacity: 0; }
        }
        @keyframes heroFadeUp {
          from { opacity: 0; transform: translateY(40px); }
          to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes heroFadeIn {
          from { opacity: 0; }
          to   { opacity: 1; }
        }
        @keyframes slideInRight {
          from { opacity: 0; transform: translateX(60px); }
          to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes pulse-glow {
          0%, 100% { box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.4); }
          50%       { box-shadow: 0 0 0 8px rgba(74, 222, 128, 0); }
        }
        @keyframes shimmer {
          0%   { background-position: -200% center; }
          100% { background-position: 200% center; }
        }
        @keyframes cardReveal {
          from { opacity: 0; transform: translateY(30px) scale(0.97); }
          to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes statReveal {
          from { opacity: 0; transform: translateY(20px); }
          to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes ctaReveal {
          from { opacity: 0; transform: translateY(40px) scale(0.98); }
          to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes scrollBounce {
          0%, 100% { transform: translateY(0); }
          50%       { transform: translateY(8px); }
        }
        @keyframes borderGlow {
          0%, 100% { border-color: rgba(255,255,255,0.15); }
          50%       { border-color: rgba(255,255,255,0.4); }
        }
        .hero-badge    { animation: heroFadeIn 0.6s ease both; }
        .hero-title    { animation: heroFadeUp 0.9s ease both; }
        .hero-subtitle { animation: heroFadeUp 0.9s 0.15s ease both; }
        .hero-cta      { animation: heroFadeUp 0.9s 0.3s ease both; }
        .hero-image    { animation: slideInRight 1s 0.2s ease both; }
        .scroll-hint   { animation: scrollBounce 2s 2s infinite ease-in-out; }
        .badge-dot     { animation: pulse-glow 2s infinite; border-radius: 50%; }
        
        .service-card {
          transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
        }
        .service-card:hover {
          transform: translateY(-10px) scale(1.02);
          box-shadow: 0 25px 50px -12px rgba(0,0,0,0.2);
        }
        .service-card:hover .card-icon {
          transform: scale(1.15) rotate(-5deg);
        }
        .card-icon { transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1); }

        .feature-card {
          transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .feature-card:hover {
          transform: translateY(-8px);
          box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15);
        }

        .cta-btn-primary {
          transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.25s ease;
        }
        .cta-btn-primary:hover {
          transform: scale(1.05) translateY(-2px);
          box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .cta-btn-secondary {
          transition: transform 0.25s ease, background 0.25s ease;
        }
        .cta-btn-secondary:hover {
          transform: scale(1.03);
          background: rgba(255,255,255,0.15);
        }

        .hero-btn-primary {
          position: relative; overflow: hidden;
          transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
        }
        .hero-btn-primary::before {
          content: '';
          position: absolute; inset: 0;
          background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
          background-size: 200%;
          opacity: 0; transition: opacity 0.3s;
        }
        .hero-btn-primary:hover::before { opacity: 1; animation: shimmer 1s linear infinite; }
        .hero-btn-primary:hover { transform: scale(1.05) translateY(-2px); box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
        .hero-btn-secondary {
          animation: borderGlow 3s infinite;
          transition: transform 0.3s ease, background 0.3s ease;
        }
        .hero-btn-secondary:hover { transform: scale(1.05); background: rgba(255,255,255,0.15); }

        .stat-divider { width: 1px; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.1), transparent); }

        .arrow-icon { transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1); }
        a:hover .arrow-icon { transform: translateX(5px); }

        .service-card { position: relative; overflow: hidden; }
      `}</style>

      <div className="flex flex-col">

        {/* ── HERO ── */}
        <section className="relative overflow-hidden text-white min-h-screen">
          <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center scale-105" style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }} />
          <div className="absolute inset-0 bg-gradient-to-br from-black/75 via-black/55 to-blue-950/70" />
          <div className="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent" />
          <Particles />

          <div className="relative z-10 flex items-center justify-between min-h-screen px-4 sm:px-6 lg:px-16 pt-20">
            <div className={`max-w-2xl transition-all duration-1000 ${heroVisible ? 'opacity-100' : 'opacity-0'}`}>
              <div className="hero-badge inline-flex items-center gap-2 mb-7 px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur-md">
                <div className="badge-dot w-2.5 h-2.5 bg-green-400" />
                <span className="text-sm text-white/85 font-medium tracking-wide">Trusted by over 10,000 members</span>
              </div>

              <h1 className="hero-title text-5xl md:text-6xl lg:text-7xl font-extrabold mb-6 leading-[1.1] tracking-tight">
                Your Community.
                <br />
                Your Cooperative.
                <br />
                <span style={{
                  background: 'linear-gradient(135deg, #60a5fa 0%, #67e8f9 50%, #a78bfa 100%)',
                  backgroundSize: '200%',
                  WebkitBackgroundClip: 'text',
                  WebkitTextFillColor: 'transparent',
                  backgroundClip: 'text',
                  animation: 'shimmer 4s linear infinite',
                }}>
                  Your Future.
                </span>
              </h1>

              <p className="hero-subtitle text-lg md:text-xl text-white/75 mb-10 max-w-xl leading-relaxed">
                Join thousands of members who trust us with their financial goals. Together, we build a stronger, more prosperous community.
              </p>

              <div className="hero-cta flex flex-wrap gap-4">
                <Link to="/membership/apply">
                  <button className="hero-btn-primary px-8 py-3.5 rounded-full bg-white text-blue-700 font-bold text-base shadow-xl hover:shadow-2xl">
                    Become a Member
                  </button>
                </Link>
                <button className="hero-btn-secondary px-8 py-3.5 rounded-full bg-white/10 text-white border border-white/20 font-semibold text-base backdrop-blur-sm">
                  Learn More
                </button>
              </div>
            </div>

            <div className="hero-image hidden lg:flex items-center justify-center flex-1 pl-10">
              <img
                src="/src/images/header.png"
                alt="Office"
                className="w-full max-w-2xl h-auto object-contain drop-shadow-2xl"
                style={{ filter: 'drop-shadow(0 20px 60px rgba(96,165,250,0.3))' }}
              />
            </div>
          </div>

          <div className="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 scroll-hint flex flex-col items-center gap-1 opacity-60">
            <span className="text-white text-xs tracking-widest uppercase">Scroll</span>
            <ChevronDown className="w-5 h-5 text-white" />
          </div>
        </section>

        {/* ── STATS ── */}
        <section className="relative -mt-20 z-20" ref={statsRef}>
          <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
          <Card
  className="backdrop-blur-xl border-border/40 shadow-2xl rounded-2xl overflow-hidden"
  style={{
    background: 'linear-gradient(135deg, rgba(219, 254, 254, 0.85) 0%, rgba(255,255,255,0.90) 100%), url("/src/images/bghd.jpg") center/cover no-repeat',
  }}
>
              <CardContent className="p-0">
                <div className="grid grid-cols-2 lg:grid-cols-4 divide-x divide-y lg:divide-y-0 divide-border/30">
                  {stats.map((stat, i) => (
                    <div
                      key={i}
                      className="text-center py-8 px-6 hover:bg-primary/5 transition-colors duration-300"
                      style={{
                        animation: statsInView ? `statReveal 0.6s ${i * 0.1}s both ease-out` : 'none',
                        opacity: statsInView ? undefined : 0,
                      }}
                    >
                      <div className="text-3xl sm:text-4xl font-black text-primary mb-1.5 tabular-nums">
                        <AnimatedCounter value={stat.value} inView={statsInView} />
                      </div>
                      <div className="text-sm text-muted-foreground font-medium">{stat.label}</div>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>
          </div>
        </section>

        {/* ── FEATURES ── */}
        <section className="py-24 sm:py-36" ref={featuresRef}>
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
              className="text-center mb-16"
              style={{ animation: featuresInView ? 'heroFadeUp 0.7s both ease-out' : 'none', opacity: featuresInView ? undefined : 0 }}
            >
              <span className="inline-block text-xs font-bold uppercase tracking-[0.2em] text-primary/70 mb-3">Why Choose Us</span>
              <h2 className="text-3xl sm:text-4xl font-bold mb-4">More Than a Bank</h2>
              <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
                We're a community dedicated to your success — where every decision is made with your future in mind.
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              {features.map((f, i) => (
                <Card
                key={i}
                className="feature-card border-border/40 rounded-2xl group cursor-default overflow-hidden"
                style={{
                  background: 'linear-gradient(135deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.88) 100%), url("/src/images/bghd.jpg") center/cover no-repeat',
                  animation: featuresInView ? `cardReveal 0.6s ${0.1 + i * 0.1}s both ease-out` : 'none',
                  opacity: featuresInView ? undefined : 0,
                }}
              >
                  <CardContent className="p-7">
                    <div
                      className="w-12 h-12 rounded-2xl flex items-center justify-center mb-5 shadow-lg group-hover:shadow-primary/40 transition-shadow duration-300 card-icon"
                      style={{ background: 'linear-gradient(135deg, #1e3a8a 0%, #60a5fa 100%)' }}
                    >
                      <f.icon className="w-6 h-6 text-white" />
                    </div>
                    <h3 className="font-bold text-base mb-2">{f.title}</h3>
                    <p className="text-sm text-muted-foreground leading-relaxed">{f.description}</p>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>

        {/* ── SERVICES ── */}
        <section className="py-24 sm:py-36 bg-muted/30" ref={servicesRef}>
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
              className="text-center mb-16"
              style={{ animation: servicesInView ? 'heroFadeUp 0.7s both ease-out' : 'none', opacity: servicesInView ? undefined : 0 }}
            >
              <span className="inline-block text-xs font-bold uppercase tracking-[0.2em] text-primary/70 mb-3">What We Offer</span>
              <h2 className="text-3xl sm:text-4xl font-bold mb-4">Our Services</h2>
              <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
                Comprehensive financial solutions designed to meet your every need.
              </p>
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
              {services.map((s, i) => (
                <Link key={i} to={s.link} className="group">
                  <Card
                    className="service-card h-full border-border/40 rounded-2xl overflow-hidden"
                    style={{
                      background: 'linear-gradient(135deg, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.88) 100%), url("/src/images/bghd.jpg") center/cover no-repeat',
                      animation: servicesInView ? `cardReveal 0.6s ${0.1 + i * 0.12}s both ease-out` : 'none',
                      opacity: servicesInView ? undefined : 0,
                    }}
                  >
                    <CardContent className="p-7">
                      <div
                        className={`card-icon w-12 h-12 rounded-2xl bg-gradient-to-br ${s.gradient} flex items-center justify-center mb-5 shadow-lg`}
                        style={{ boxShadow: `0 8px 20px -4px ${s.accent}55` }}
                      >
                        <s.icon className="w-6 h-6 text-white" />
                      </div>
                      <h3 className="font-bold text-base mb-2">{s.title}</h3>
                      <p className="text-sm text-muted-foreground mb-5 leading-relaxed">{s.description}</p>
                      <div className="flex items-center text-primary font-semibold text-sm">
                        <span>Learn more</span>
                        <ArrowRight className="arrow-icon w-4 h-4 ml-1.5" />
                      </div>
                    </CardContent>
                  </Card>
                </Link>
              ))}
            </div>
          </div>
        </section>

        {/* ── CTA ── */}
        <section className="py-24 sm:py-36" ref={ctaRef}>
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <Card
              className="border-none shadow-2xl rounded-3xl overflow-hidden !bg-transparent"
              style={{
                background: 'linear-gradient(135deg, rgba(30,58,138,0.88) 0%, rgba(96,165,250,0.88) 100%), url("/src/images/bghd.jpg") center/cover no-repeat',
                animation: ctaInView ? 'ctaReveal 0.8s both ease-out' : 'none',
                opacity: ctaInView ? undefined : 0,
              }}
            >
              <CardContent className="p-12 sm:p-16 relative">
                <div className="absolute inset-0 overflow-hidden pointer-events-none">
                  <div style={{
                    position: 'absolute', inset: '-50%',
                    background: 'radial-gradient(circle at 20% 50%, rgba(255,255,255,0.08) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.06) 0%, transparent 40%)',
                    animation: 'shimmer 8s linear infinite',
                  }} />
                </div>
                <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS1vcGFjaXR5PSIwLjA1IiBzdHJva2Utd2lkdGg9IjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20" />

                <div className="relative z-10 text-center max-w-3xl mx-auto">
                  <div className="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full bg-white/15 border border-white/20 backdrop-blur-sm">
                    <div className="badge-dot w-2 h-2 bg-green-400" />
                    <span className="text-sm font-medium text-white">Applications open now</span>
                  </div>
                  <h2 className="text-3xl sm:text-5xl font-extrabold mb-4 leading-tight text-white">
                    Ready to Get Started?
                  </h2>
                  <p className="text-lg mb-10 max-w-xl mx-auto leading-relaxed text-white/90">
                    Join our community today and experience the benefits of cooperative banking — built for people, not profit.
                  </p>
                  <div className="flex flex-col sm:flex-row gap-4 justify-center">
                    <Button asChild size="lg" className="cta-btn-primary bg-white !text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold px-8">
                      <Link to="/membership/apply">
                        Apply for Membership
                        <ArrowRight className="ml-2 w-5 h-5" />
                      </Link>
                    </Button>
                    <Button asChild size="lg" variant="outline" className="cta-btn-secondary bg-transparent border-white/40 !text-white hover:!text-white hover:bg-white/15 rounded-xl font-semibold px-8 backdrop-blur-sm !bg-transparent">
  <Link to="/contact">Contact Us</Link>
</Button>
                  </div>
                </div>
              </CardContent>
            </Card>
          </div>
        </section>

      </div>
    </>
  );
}