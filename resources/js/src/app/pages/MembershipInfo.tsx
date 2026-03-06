import { Link } from 'react-router';
import { Users, CheckCircle, ArrowRight, Shield, Heart, TrendingUp, Gift } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Button } from '../components/ui/button';
import { Badge } from '../components/ui/badge';
import { useEffect, useState } from 'react';

export function MembershipInfo() {
  const [heroVisible, setHeroVisible] = useState(false);
  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const benefits = [
    { icon: TrendingUp, title: 'Competitive Rates', description: "Access to loans with lower interest rates and savings with higher returns." },
    { icon: Shield, title: 'Financial Security', description: 'Your deposits are insured and your financial well-being is our priority.' },
    { icon: Gift, title: 'Member Dividends', description: "Share in the cooperative's success through annual dividend distributions." },
    { icon: Heart, title: 'Community Support', description: 'Be part of a community that supports local development and prosperity.' },
  ];

  const membershipTypes = [
    {
      title: 'Regular Member',
      description: 'Full membership with voting rights and access to all products and services.',
      requirements: [
        'Must be at least 18 years old',
        'Philippine citizen or resident',
        'Good moral character',
        'Completed orientation seminar'
      ],
      shareCapital: '₱500 minimum',
      gradient: 'from-blue-500 to-blue-600'
    },
    {
      title: 'Associate Member',
      description: 'Limited membership for those who cannot meet regular membership requirements.',
      requirements: [
        'Employees of member organizations',
        'Immediate family of regular members',
        'Students (16-18 years old)',
        'Completed orientation seminar'
      ],
      shareCapital: '₱250 minimum',
      gradient: 'from-purple-500 to-purple-600'
    }
  ];

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-3xl">
            <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Join Our Community</Badge>
            <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">Membership Information</h1>
            <p className="text-xl text-blue-100 mb-10 leading-relaxed">
              Become part of a thriving community cooperative dedicated to your financial success.
              Experience the benefits of member-owned banking.
            </p>
            <Button asChild size="lg" className="bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold">
              <Link to="/membership/apply">
                Apply Now
                <ArrowRight className="ml-2 w-5 h-5" />
              </Link>
            </Button>
          </div>
        </div>
      </section>

      {/* ── Benefits ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-14">
            <h2 className="text-3xl sm:text-4xl font-bold mb-4">Member Benefits</h2>
            <p className="text-lg text-muted-foreground max-w-2xl mx-auto">
              Enjoy exclusive advantages designed for our valued members
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {benefits.map((benefit, index) => (
              <Card key={index} className="border-border/50 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 rounded-2xl bg-card/90 backdrop-blur-sm">
                <CardContent className="p-6 text-center">
                  <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center mb-4 shadow-lg mx-auto">
                    <benefit.icon className="w-7 h-7 text-white" />
                  </div>
                  <h3 className="font-semibold mb-2">{benefit.title}</h3>
                  <p className="text-sm text-muted-foreground">{benefit.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Membership Types ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-14">
            <h2 className="text-3xl sm:text-4xl font-bold mb-4 text-white">Types of Membership</h2>
            <p className="text-lg text-white/70 max-w-2xl mx-auto">
              Choose the membership type that best fits your situation
            </p>
          </div>
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-5xl mx-auto">
            {membershipTypes.map((type, index) => (
              <Card key={index} className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md hover:bg-white/15 transition-all duration-300 hover:-translate-y-1">
                <CardHeader>
                  <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${type.gradient} flex items-center justify-center mb-4 shadow-lg`}>
                    <Users className="w-7 h-7 text-white" />
                  </div>
                  <CardTitle className="text-white">{type.title}</CardTitle>
                  <Badge className="w-fit mt-2 bg-white/20 text-white border-white/30">{type.shareCapital}</Badge>
                </CardHeader>
                <CardContent className="space-y-4">
                  <p className="text-sm text-white/70">{type.description}</p>
                  <div className="space-y-2">
                    <p className="text-sm font-medium text-white">Requirements:</p>
                    <ul className="space-y-2">
                      {type.requirements.map((req, idx) => (
                        <li key={idx} className="text-sm text-white/70 flex items-start gap-2">
                          <CheckCircle className="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" />
                          {req}
                        </li>
                      ))}
                    </ul>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* ── Rights and Privileges ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center">Member Rights & Privileges</h2>
            <div className="grid md:grid-cols-2 gap-6">
              <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50">
                <CardHeader>
                  <CardTitle>As a Regular Member, you can:</CardTitle>
                </CardHeader>
                <CardContent>
                  <ul className="space-y-2 text-sm">
                    {[
                      'Vote in annual general assemblies',
                      'Run for board positions',
                      'Access all loan products',
                      'Open all types of savings accounts',
                      'Receive annual dividends',
                      'Attend member education seminars',
                      'Participate in all cooperative programs',
                    ].map((item, i) => (
                      <li key={i} className="flex items-start gap-2">
                        <CheckCircle className="w-4 h-4 text-primary mt-0.5 flex-shrink-0" />
                        {item}
                      </li>
                    ))}
                  </ul>
                </CardContent>
              </Card>

              <Card className="rounded-2xl bg-card/90 backdrop-blur-sm border-border/50">
                <CardHeader>
                  <CardTitle>As an Associate Member, you can:</CardTitle>
                </CardHeader>
                <CardContent>
                  <ul className="space-y-2 text-sm">
                    {[
                      'Access selected loan products',
                      'Open savings accounts',
                      'Attend member seminars',
                      'Upgrade to regular membership',
                      'Receive patronage refunds',
                      'Participate in cooperative events',
                    ].map((item, i) => (
                      <li key={i} className="flex items-start gap-2">
                        <CheckCircle className="w-4 h-4 text-primary mt-0.5 flex-shrink-0" />
                        {item}
                      </li>
                    ))}
                  </ul>
                </CardContent>
              </Card>
            </div>
          </div>
        </div>
      </section>

      {/* ── CTA ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <Card className="bg-gradient-to-br from-primary via-primary to-secondary text-white border-none shadow-2xl rounded-3xl overflow-hidden">
            <CardContent className="p-12 sm:p-16 text-center relative">
              <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-10" />
              <div className="relative z-10">
                <h2 className="text-3xl sm:text-4xl font-bold mb-4">Ready to Join?</h2>
                <p className="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                  Learn more about the membership process or start your application today.
                </p>
                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                  <Button asChild size="lg" className="bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold">
                    <Link to="/membership/apply">
                      Apply Now
                      <ArrowRight className="ml-2 w-5 h-5" />
                    </Link>
                  </Button>
                  <Button asChild size="lg" variant="outline" className="cta-btn-primary bg-white text-primary hover:bg-blue-50 shadow-xl rounded-xl font-bold px-8">
                    <Link to="/membership/steps">View Process</Link>
                  </Button>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </section>

    </div>
  );
}